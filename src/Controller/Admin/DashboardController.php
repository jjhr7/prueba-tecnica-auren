<?php

namespace App\Controller\Admin;

use App\Controller\CountryCrudController;
use App\Entity\Country;
use App\Entity\User;
use App\Repository\CountryRepository;
use App\Service\CountryImporter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    private CountryImporter $countryImportService;
    private CountryRepository $countryRepository;

    public function __construct(CountryImporter $countryImporter, CountryRepository $countryRepository)
    {
        $this->countryImportService = $countryImporter;
        $this->countryRepository = $countryRepository;
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CountryCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Prueba Técnica Auren');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::linkToRoute('Importar Países', 'fas fa-download', 'app-import-countries');
        yield MenuItem::linkToCrud('Paises', 'fas fa-list', Country::class);
        yield MenuItem::linkToCrud('Usuarios', 'fas fa-users', User::class);
        yield MenuItem::linkToRoute('Home', 'fas fa-home', 'app_home');
    }

    #[Route('/import-countries', name: 'app-import-countries')]
    public function importCountriesFromApi(): Response{

        if ($this->countryRepository->thereIsCountryData()) {
            $this->addFlash('info', 'Los datos de los países ya han sido importados.');
        } else {
            $countriesRest = HttpClient::create();
            try {
                $response = $countriesRest->request('GET', 'https://restcountries.com/v3.1/all');

                if ($response->getStatusCode() === 200) {
                    $content = $response->getContent();
                    $this->countryImportService->import($content);
                    $this->addFlash('success', 'Los países han sido importados exitosamente!');
                } else {
                    $this->addFlash('error', 'Hubo un problema al intentar importar los países.');
                }
            } catch (\Exception $e) {
                $this->addFlash('error', 'Hubo un error: ' . $e->getMessage());
            }
        }

        return $this->redirectToRoute('admin');
    }
}
