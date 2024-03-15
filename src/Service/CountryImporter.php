<?php

namespace App\Service;

use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
class CountryImporter
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function import(string $jsonData)
    {
        $countriesData = json_decode($jsonData, true);

        foreach ($countriesData as $countryData) {
            $country = new Country();
            $country->setCommonName($countryData['name']['common']);
            $country->setOfficialName($countryData['name']['official']);
            $country->setNativeData($this->getDataFromObjectMultiple($countryData['name']['nativeName'] ?? [],'official','common'));
            $country->setTld(isset($countryData['tld']) ? implode(',', $countryData['tld']) : '');
            $country->setCca2($countryData['cca2'] ?? "");
            $country->setCcn3($countryData['ccn3'] ?? "");
            $country->setCca3($countryData['cca3'] ?? "");
            $country->setCioc($countryData['cioc'] ?? "");
            $country->setIndependent($countryData['independent'] ?? false);
            $country->setStatus($countryData['status'] ?? "");
            $country->setUnMember($countryData['unMember'] ?? false);
            $country->setCurrencies($this->getDataFromObjectMultiple($countryData['currencies'] ?? [],'name','symbol'));
            $country->setCallingCode(($countryData['idd']['root'] ?? 'N/A') . (isset($countryData['idd']['suffixes']) ? '(' . implode(',', $countryData['idd']['suffixes']) . ')' : ''));
            $country->setCapital(isset($countryData['capital']) ? implode(',', $countryData['capital']) : '');
            $country->setAltSpellings(isset($countryData['altSpellings']) ? implode(',', $countryData['altSpellings']) : '');
            $country->setRegion($countryData['region'] ?? "");
            $country->setSubregion($countryData['subregion'] ?? "");
            $country->setLanguages($this->getKeyAndValueFromObject($countryData['languages'] ?? []));
            $country->setTranslations($this->getDataFromObjectMultiple($countryData['translations'] ?? [],'official', 'common'));
            $country->setGeographicCoords(isset($countryData['latlng']) ? implode(',', $countryData['latlng']) : '');
            $country->setLandLocked($countryData['landlocked'] ?? false);
            $country->setBorders(isset($countriesData['borders'])? implode(',',$countriesData['borders']):"");
            $country->setArea($countryData['area'] ?? 0);
            $country->setDemonyms($this->getDataFromObjectMultiple($countryData['demonyms'] ?? [],'f','m'));
            $country->setFlag($countryData['flag'] ?? "");
            $country->setMaps(isset($countryData['maps']) ? $countryData['maps']['googleMaps'] . ', ' . $countryData['maps']['openStreetMaps'] : '');
            $country->setPopulation($countryData['population'] ?? 0);
            $country->setGini($this->getKeyAndValueFromObject($countryData['gini'] ?? []));
            $country->setFifa($countryData['fifa'] ?? "");
            $country->setCar(isset($countryData['car']) ? implode(',', $countryData['car']['signs'] ?? []) . ', ' . $countryData['car']['side'] : '');
            $country->setTimeZones(isset($countryData['timezones']) ? implode(',', $countryData['timezones']) : '');
            $country->setContinents(isset($countryData['continents']) ? implode(',', $countryData['continents']) : '');
            $country->setFlags($this->getKeyAndValueFromObject($countryData['flags'] ?? []));
            $country->setCoatOfArms(isset($countryData['coatOfArms']) && count($countryData['coatOfArms']) > 0 ? $countryData['coatOfArms']['png'] . ', ' . $countryData['coatOfArms']['svg'] : '');
            $country->setStartOfWeek($countryData['startOfWeek'] ?? "");
            $country->setCapitalCoords(isset($countryData['capitalInfo']) ? implode(',', $countryData['capitalInfo']['latlng'] ?? []) : '');
            $country->setPostalCodeData(isset($countryData['postalCode']) ? $this->getKeyAndValueFromObject($countryData['postalCode']) : "");

            $this->em->persist($country);
        }

        $this->em->flush();
    }

    private function getKeyAndValueFromObject($objectToProcess): string{
        $stringToReturn ="";
        foreach ($objectToProcess as $key => $item){
            $stringToReturn.=$key.": ".$item.", ";
        }
        return substr($stringToReturn, 0, -2);
    }

    private function getDataFromObjectMultiple($data, $typeA, $typeB): string {
        $dataString = "";
        foreach ($data as $key => $item) {
            $valueA = $item[$typeA] ?? 'N/A';
            $valueB = $item[$typeB] ?? 'N/A';
            $dataString .= $key . ": " . $valueA . ', ' . $valueB . '; ';
        }
        return substr($dataString, 0, -2);
    }

   public function countriesToJson():string{
        $countriesData = [];
        $countries = $this->em->getRepository(Country::class)->findAll();
       foreach ($countries as $country) {
           $countriesData[] = [
               'commonName' => $country->getCommonName(),
               'officialName' => $country->getOfficialName(),
               'nativeData' => $country->getNativeData(),
               'tld' => $country->getTld(),
               'cca2' => $country->getCca2(),
               'ccn3' => $country->getCcn3(),
               'cca3' => $country->getCca3(),
               'cioc' => $country->getCioc(),
               'independent' => $country->isIndependent(),
               'status' => $country->getStatus(),
               'unMember' => $country->isUnMember(),
               'currencies' => $country->getCurrencies(),
               'callingCode' => $country->getCallingCode(),
               'capital' => $country->getCapital(),
               'altSpellings' => $country->getAltSpellings(),
               'region' => $country->getRegion(),
               'subregion' => $country->getSubregion(),
               'languages' => $country->getLanguages(),
               'translations' => $country->getTranslations(),
               'geographicCoords' => $country->getGeographicCoords(),
               'landLocked' => $country->isLandLocked(),
               'borders' => $country->getBorders(),
               'area' => $country->getArea(),
               'demonyms' => $country->getDemonyms(),
               'flag' => $country->getFlag(),
               'maps' => $country->getMaps(),
               'population' => $country->getPopulation(),
               'gini' => $country->getGini(),
               'fifa' => $country->getFifa(),
               'car' => $country->getCar(),
               'timeZones' => $country->getTimeZones(),
               'continents' => $country->getContinents(),
               'flags' => $country->getFlags(),
               'coatOfArms' => $country->getCoatOfArms(),
               'startOfWeek' => $country->getStartOfWeek(),
               'capitalCoords' => $country->getCapitalCoords(),
               'postalCodeData' => $country->getPostalCodeData(),
           ];
       }
       return json_encode($countriesData, JSON_UNESCAPED_UNICODE);
   }


}