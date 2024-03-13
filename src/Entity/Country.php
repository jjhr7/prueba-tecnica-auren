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
    private ?string $commonname = null;

    #[ORM\Column(length: 255)]
    private ?string $officialname = null;

    #[ORM\Column(length: 255)]
    private ?string $nativeofficialname = null;

    #[ORM\Column(length: 255)]
    private ?string $nativecommonname = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $tld = null;

    #[ORM\Column(length: 3)]
    private ?string $cca2 = null;

    #[ORM\Column]
    private ?int $ccn3 = null;

    #[ORM\Column(length: 3)]
    private ?string $cca3 = null;

    #[ORM\Column(length: 5)]
    private ?string $cioc = null;

    #[ORM\Column]
    private ?bool $independent = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?bool $unmember = null;

    #[ORM\Column(length: 255)]
    private ?string $currencies = null;

    #[ORM\Column(length: 255)]
    private ?string $callingcode = null;

    #[ORM\Column(length: 255)]
    private ?string $capital = null;

    #[ORM\Column(length: 255)]
    private ?string $altspellings = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    private ?string $subregion = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lenguages = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $translations = null;

    #[ORM\Column(length: 255)]
    private ?string $geographiccoords = null;

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
    private ?string $timezones = null;

    #[ORM\Column(length: 255)]
    private ?string $continents = null;

    #[ORM\Column(length: 255)]
    private ?string $flags = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coatOfArms = null;

    #[ORM\Column(length: 255)]
    private ?string $startOfWeek = null;

    #[ORM\Column(length: 255)]
    private ?string $capitalCoords = null;

    #[ORM\Column(length: 255)]
    private ?string $postalCodeFormat = null;

    #[ORM\Column(length: 255)]
    private ?string $postalCodeRegex = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommonname(): ?string
    {
        return $this->commonname;
    }

    public function setCommonname(string $commonname): static
    {
        $this->commonname = $commonname;

        return $this;
    }

    public function getOfficialname(): ?string
    {
        return $this->officialname;
    }

    public function setOfficialname(string $officialname): static
    {
        $this->officialname = $officialname;

        return $this;
    }

    public function getNativeofficialname(): ?string
    {
        return $this->nativeofficialname;
    }

    public function setNativeofficialname(string $nativeofficialname): static
    {
        $this->nativeofficialname = $nativeofficialname;

        return $this;
    }

    public function getNativecommonname(): ?string
    {
        return $this->nativecommonname;
    }

    public function setNativecommonname(string $nativecommonname): static
    {
        $this->nativecommonname = $nativecommonname;

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

    public function getCcn3(): ?int
    {
        return $this->ccn3;
    }

    public function setCcn3(int $ccn3): static
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
        return $this->unmember;
    }

    public function setUnmember(bool $unmember): static
    {
        $this->unmember = $unmember;

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

    public function getCallingcode(): ?string
    {
        return $this->callingcode;
    }

    public function setCallingcode(string $callingcode): static
    {
        $this->callingcode = $callingcode;

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

    public function getAltspellings(): ?string
    {
        return $this->altspellings;
    }

    public function setAltspellings(string $altspellings): static
    {
        $this->altspellings = $altspellings;

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

    public function getLenguages(): ?string
    {
        return $this->lenguages;
    }

    public function setLenguages(string $lenguages): static
    {
        $this->lenguages = $lenguages;

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

    public function getGeographiccoords(): ?string
    {
        return $this->geographiccoords;
    }

    public function setGeographiccoords(string $geographiccoords): static
    {
        $this->geographiccoords = $geographiccoords;

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

    public function setBorders(?string $borders): static
    {
        $this->borders = $borders;

        return $this;
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

    public function getTimezones(): ?string
    {
        return $this->timezones;
    }

    public function setTimezones(string $timezones): static
    {
        $this->timezones = $timezones;

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

    public function getPostalCodeFormat(): ?string
    {
        return $this->postalCodeFormat;
    }

    public function setPostalCodeFormat(string $postalCodeFormat): static
    {
        $this->postalCodeFormat = $postalCodeFormat;

        return $this;
    }

    public function getPostalCodeRegex(): ?string
    {
        return $this->postalCodeRegex;
    }

    public function setPostalCodeRegex(string $postalCodeRegex): static
    {
        $this->postalCodeRegex = $postalCodeRegex;

        return $this;
    }
}
