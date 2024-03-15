<?php

namespace App\Controller;

use App\Entity\Country;
use App\Repository\CountryRepository;
use App\Service\CountryImporter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    private EntityManagerInterface $em;
    private CountryImporter $countryImporter;

    /**
     * @param EntityManagerInterface $em
     * @param CountryImporter $countryImporter
     */
    public function __construct(EntityManagerInterface $em, CountryImporter $countryImporter)
    {
        $this->em = $em;
        $this->countryImporter = $countryImporter;
    }


    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $countryRepo = $this->em->getRepository(Country::class);
        $thereIsData = $countryRepo->thereIsCountryData();
        $countriesData= "";

        if($thereIsData){
            $countriesData = $this->countryImporter->countriesToJson();
        }

        return $this->render('home/index.html.twig', [
            'thereIsData' => $thereIsData,
            'countriesData' => $countriesData,
            'currentPage' => 'home'
        ]);
    }

}


