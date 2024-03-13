<?php

namespace App\Controller\Admin;

use App\Service\CountryImporter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Controller\DashboardControllerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{
    private $countryImportService;
    public function __construct(CountryImporter $countryImporter)
    {
        $this->countryImportService = $countryImporter;
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Prueba Tecnica Auren');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/import-countries', name: 'import-countries')]
    public function importCountriesFromApi(CountryImporter $countryImporter): Response{
        $countriesRest = HttpClient::create();
        try {
            $response = $countriesRest->request('GET', 'https://restcountries.com/v3.1/all');

            if($response->getStatusCode() === 200){
               $content = $response->getContent();
               $countryImporter->import($content);

               return new JsonResponse([
                   'status' => 'OK',
                   'message' => 'Countries has been imported successfully!'
               ], Response::HTTP_OK);
            }
            return new JsonResponse([
                'status' => 'KO',
                'message' => 'There was an error!'
            ], Response::HTTP_BAD_REQUEST);
        }catch (\Exception $e){
            return new JsonResponse([
                'status' => 'KO',
                'message' => 'There was an error: '.$e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
