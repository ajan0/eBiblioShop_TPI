<?php

namespace App\Services\BookLookup;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use JsonPath\JsonObject;
use Illuminate\Http\Client\ConnectionException;

class BookLookup
{
    public $providers;

    public function __construct()
    {
        $this->providers = collect();

        foreach(Config::get('booklookup.providers') as $provider)
        {
            $this->providers->push($provider);
        }
    }

    public function search($isbn)
    {
        foreach($this->providers as $provider)
        {
            try
            {
                $data = $this->call($provider, ['isbn' => $isbn]);
                if ($data)
                {
                    return $data;
                }
            }
            catch(ConnectionException)
            {
                continue;
            }
        }
        return false;
    }

    public function call($provider, $queries)
    {
        $placeholders = collect($queries)
            ->keys()
            ->map(function($key) {
                return "/\{$key\}/";
            })
            ->toArray();
        
        $url = preg_replace($placeholders, array_values($queries), $provider['url']);
        
        $response = Http::get($url);
        
        if ($response->ok())
        {
            $parsed = [];

            $jsonObject = new JsonObject($response->json(), true);

            if (isset($provider['jsonPaths']))
            {
                foreach ($provider['jsonPaths'] as $key => $mixed)
                {
                    // Decide whether we need to call a nested provider.
                    if (is_array($mixed))
                    {
                        $subprovider = $this->getProvider($mixed['subprovider']);
                        $results = $jsonObject->get($mixed['jsonPath']);
                        
                        if (is_array($results))
                        {
                            $parsed[$key] = array();
                            foreach ($results as $result)
                            {
                                $parsed[$key][] = $this->call($subprovider, [$key => $result]);
                            }
                        }
                        else
                        {
                            $parsed[$key] = $this->call($subprovider, [$key => $results]);
                        }
                    }
                    // Otherwise check if the JsonPath was provided, 
                    // in this case we can directly obtain the information.
                    else if (gettype($mixed) === 'string')
                    {
                        // Reassignment of variables for ease of reading purposes.
                        $jsonPath = $mixed;
                        $parsed[$key] = $jsonObject->get($jsonPath);
                    }
                    // Unsupported data type was assigned to the key.
                    else
                    {
                        throw new \Exception("Unsupported data type for `$key`.");
                    }
                }
                return $parsed;
            }
            else if (isset($provider['jsonPath']))
            {
                return $jsonObject->get($provider['jsonPath']);
            }
            else
            {
                throw new \Exception("Error detected in the config file: no `jsonPath` or `jsonPaths` provided for route $provider[url]."); 
            }
        }
        return false;
    }

    public function getProvider($id)
    {
        return $this->providers->firstWhere('id', $id);
    }

}