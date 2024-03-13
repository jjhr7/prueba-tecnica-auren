<?php

namespace App\Service;

use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Serializer\SerializerInterface;
class CountryImporter
{
    private EntityManagerInterface $em;
    private $serializer;

    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    public function import(string $jsonData)
    {
        $countriesData = json_decode($jsonData, true);

        foreach ($countriesData as $countryData) {
            $country = new Country();
            $country->setCommonname($countryData['name']['common']);
            $country->setOfficialname($countryData['name']['official']);
            $country->setNativeofficialname($this->getSingleStringFromObject($countryData['name']['nativeName'],'official'));
            $country->setNativecommonname($this->getSingleStringFromObject($countryData['name']['nativeName'], 'common'));
            $country->setTld(implode(',', $countryData['tld']));
            $country->setCca2($countryData['cca2']);
            $country->setCcn3($countryData['ccn3']);
            $country->setCca3($countryData['cca3']);
            $country->setCioc($countryData['cioc']);
            $country->setIndependent($countryData['independent']);
            $country->setStatus($countryData['status']);
            $country->setUnmember($countryData['unMember']);
            $country->setCurrencies($this->getDataFromObjectMultiple($countryData['currencies'],'name','symbol'));
            $country->setCallingcode($countryData['idd']['root'].'('.implode(',',$countryData['idd']['suffixes']).')');
            $country->setCapital(implode(',', $countryData['capital']));
            $country->setAltspellings(implode(',', $countryData['altSpellings']));
            $country->setRegion($countryData['region']);
            $country->setSubregion($countryData['subregion']);
            $country->setLenguages($this->getKeyAndValueFromObject($countryData['lenguages']));
            $country->setTranslations($this->getDataFromObjectMultiple($countryData['translations'],'official', 'common'));
            $country->setGeographiccoords(implode(',',$countryData['latlng']));
            $country->setLandLocked($countryData['landlocked']);
            $country->setBorders(implode(',',$countryData['borders']));
            $country->setArea($countryData['area']);
            $country->setDemonyms($this->getDataFromObjectMultiple($countryData['demonyms'],'f','m'));
            $country->setFlag($countryData['flag']);
            $country->setMaps($countryData['maps']['googleMpas'].', '.$countryData['maps']['googleMpas']);
            $country->setPopulation($countryData['population']);
            $country->setGini($this->getKeyAndValueFromObject($countryData['gini']));
            $country->setFifa($countryData['fifa']);
            $country->setCar(implode(',',$countryData['car']['signs']).$countriesData['car']['side']);
            $country->setTimezones(implode(',', $countryData['timezones']));
            $country->setContinents(implode(',', $countryData['continents']));
            $country->setFlags($countryData['flags']['png'].', '.$countryData['flags']['svg'].', '.$countryData['flags']['alt']);
            $country->setCoatOfArms(count($countryData['coatOfArms'])>0?$countryData['coatOfArms']['png'].', '.$countryData['coatOfArms']['svg']:'');
            $country->setStartOfWeek($countryData['startOfWeek']);
            $country->setCapitalCoords($countryData['capitalInfo']['latlng']);
            $country->setPostalCodeFormat($countryData['postalCode']['format']);
            $country->setPostalCodeRegex($countryData['postalCode']['regex']);

            $this->em->persist($country);
        }

        $this->em->flush();
    }

    private function getSingleStringFromObject($dataToExtract, $dataType): string{
        foreach ($dataToExtract as $data){
            if (isset($data[$dataType])) {
                return $data[$dataType];
            }
        }
        return "";
    }

    private function getKeyAndValueFromObject($objectToProcess): string{
        $stringToReturn ="";
        foreach ($objectToProcess as $key => $item){
            $stringToReturn.=$key.": ".$item.", ";
        }
        return substr($stringToReturn, 0, -2);
    }

    private function getDataFromObjectMultiple($currencies,$typeA, $typeB): string{
        $currenciesString ="";
        foreach ($currencies as $key => $currency){
            $currenciesString.=$key.": ".$currency[$typeA].', '.$currency[$typeB].'; ';
        }
        return substr($currenciesString, 0, -2);
    }


}