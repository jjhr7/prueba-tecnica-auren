<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $commonName = null;

    #[ORM\Column(length: 255)]
    private ?string $officialName = null;

    #[ORM\Column(type:  Types::TEXT)]
    private ?string $nativeData = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tld = null;

    #[ORM\Column(length: 255)]
    private ?string $cca2 = null;

    #[ORM\Column(length: 255)]
    private ?string $ccn3 = null;

    #[ORM\Column(length: 255)]
    private ?string $cca3 = null;

    #[ORM\Column(length: 255)]
    private ?string $cioc = null;

    #[ORM\Column]
    private ?bool $independent = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?bool $unMember = null;

    #[ORM\Column(length: 255)]
    private ?string $currencies = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $callingCode = null;

    #[ORM\Column(length: 255)]
    private ?string $capital = null;

    #[ORM\Column(length: 255)]
    private ?string $altSpellings = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    private ?string $subregion = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $languages = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $translations = null;

    #[ORM\Column(length: 255)]
    private ?string $geographicCoords = null;

    #[ORM\Column]
    private ?bool $landLocked = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $borders = null;

    #[ORM\Column]
    private ?float $area = null;

    #[ORM\Column(length: 255)]
    private ?string $demonyms = null;

    #[ORM\Column(length: 255)]
    private ?string $flag = null;

    #[ORM\Column(length: 255)]
    private ?string $maps = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $population = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gini = null;

    #[ORM\Column(length: 255)]
    private ?string $fifa = null;

    #[ORM\Column(length: 255)]
    private ?string $car = null;

    #[ORM\Column(length: 255)]
    private ?string $timeZones = null;

    #[ORM\Column(length: 255)]
    private ?string $continents = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $flags = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coatOfArms = null;

    #[ORM\Column(length: 255)]
    private ?string $startOfWeek = null;

    #[ORM\Column(length: 255)]
    private ?string $capitalCoords = null;

    #[ORM\Column(length: 255)]
    private ?string $postalCodeData = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function setCommonName(string $commonName): static
    {
        $this->commonName = $commonName;

        return $this;
    }

    public function getOfficialName(): ?string
    {
        return $this->officialName;
    }

    public function setOfficialName(string $officialName): static
    {
        $this->officialName = $officialName;

        return $this;
    }

    public function getNativeData(): ?string
    {
        return $this->nativeData;
    }

    public function setNativeData(string $nativeData): static
    {
        $this->nativeData = $nativeData;

        return $this;
    }


    public function getTld(): ?string
    {
        return $this->tld;
    }

    public function setTld(?string $tld): static
    {
        $this->tld = $tld;

        return $this;
    }

    public function getCca2(): ?string
    {
        return $this->cca2;
    }

    public function setCca2(string $cca2): static
    {
        $this->cca2 = $cca2;

        return $this;
    }

    public function getCcn3(): ?string
    {
        return $this->ccn3;
    }

    public function setCcn3(string $ccn3): static
    {
        $this->ccn3 = $ccn3;

        return $this;
    }

    public function getCca3(): ?string
    {
        return $this->cca3;
    }

    public function setCca3(string $cca3): static
    {
        $this->cca3 = $cca3;

        return $this;
    }

    public function getCioc(): ?string
    {
        return $this->cioc;
    }

    public function setCioc(string $cioc): static
    {
        $this->cioc = $cioc;

        return $this;
    }

    public function isIndependent(): ?bool
    {
        return $this->independent;
    }

    public function setIndependent(bool $independent): static
    {
        $this->independent = $independent;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function isUnMember(): ?bool
    {
        return $this->unMember;
    }

    public function setUnMember(bool $unMember): static
    {
        $this->unMember = $unMember;

        return $this;
    }

    public function getCurrencies(): string
    {
        return $this->currencies;
    }

    public function setCurrencies(string $currencies): static
    {
        $this->currencies = $currencies;

        return $this;
    }

    public function getCallingCode(): ?string
    {
        return $this->callingCode;
    }

    public function setCallingCode(string $callingCode): static
    {
        $this->callingCode = $callingCode;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(string $capital): static
    {
        $this->capital = $capital;

        return $this;
    }

    public function getAltSpellings(): ?string
    {
        return $this->altSpellings;
    }

    public function setAltSpellings(string $altSpellings): static
    {
        $this->altSpellings = $altSpellings;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getSubregion(): ?string
    {
        return $this->subregion;
    }

    public function setSubregion(string $subregion): static
    {
        $this->subregion = $subregion;

        return $this;
    }

    public function getLanguages(): ?string
    {
        return $this->languages;
    }

    public function setLanguages(string $languages): static
    {
        $this->languages = $languages;

        return $this;
    }

    public function getTranslations(): ?string
    {
        return $this->translations;
    }

    public function setTranslations(?string $translations): static
    {
        $this->translations = $translations;

        return $this;
    }

    public function getGeographicCoords(): ?string
    {
        return $this->geographicCoords;
    }

    public function setGeographicCoords(string $geographicCoords): static
    {
        $this->geographicCoords = $geographicCoords;

        return $this;
    }

    public function isLandLocked(): ?bool
    {
        return $this->landLocked;
    }

    public function setLandLocked(bool $landLocked): static
    {
        $this->landLocked = $landLocked;

        return $this;
    }

    public function getBorders(): ?string
    {
        return $this->borders;
    }
    public function setBorders(?string $borders): void
    {
        $this->borders = $borders;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function setArea(float $area): static
    {
        $this->area = $area;

        return $this;
    }

    public function getDemonyms(): string
    {
        return $this->demonyms;
    }

    public function setDemonyms(string $demonyms): static
    {
        $this->demonyms = $demonyms;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(string $flag): static
    {
        $this->flag = $flag;

        return $this;
    }

    public function getMaps(): ?string
    {
        return $this->maps;
    }

    public function setMaps(string $maps): static
    {
        $this->maps = $maps;

        return $this;
    }

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(string $population): static
    {
        $this->population = $population;

        return $this;
    }

    public function getGini(): ?string
    {
        return $this->gini;
    }

    public function setGini(?string $gini): static
    {
        $this->gini = $gini;

        return $this;
    }

    public function getFifa(): ?string
    {
        return $this->fifa;
    }

    public function setFifa(string $fifa): static
    {
        $this->fifa = $fifa;

        return $this;
    }

    public function getCar(): string
    {
        return $this->car;
    }

    public function setCar(string $car): static
    {
        $this->car = $car;

        return $this;
    }

    public function getTimeZones(): ?string
    {
        return $this->timeZones;
    }

    public function setTimeZones(string $timeZones): static
    {
        $this->timeZones = $timeZones;

        return $this;
    }

    public function getContinents(): ?string
    {
        return $this->continents;
    }

    public function setContinents(string $continents): static
    {
        $this->continents = $continents;

        return $this;
    }

    public function getFlags(): string
    {
        return $this->flags;
    }

    public function setFlags(string $flags): static
    {
        $this->flags = $flags;

        return $this;
    }

    public function getCoatOfArms(): ?string
    {
        return $this->coatOfArms;
    }

    public function setCoatOfArms(?string $coatOfArms): static
    {
        $this->coatOfArms = $coatOfArms;

        return $this;
    }

    public function getStartOfWeek(): ?string
    {
        return $this->startOfWeek;
    }

    public function setStartOfWeek(string $startOfWeek): static
    {
        $this->startOfWeek = $startOfWeek;

        return $this;
    }

    public function getCapitalCoords(): ?string
    {
        return $this->capitalCoords;
    }

    public function setCapitalCoords(string $capitalCoords): static
    {
        $this->capitalCoords = $capitalCoords;

        return $this;
    }

    public function getPostalCodeData(): ?string
    {
        return $this->postalCodeData;
    }

    public function setPostalCodeData(string $postalCodeData): static
    {
        $this->postalCodeData = $postalCodeData;

        return $this;
    }

}
