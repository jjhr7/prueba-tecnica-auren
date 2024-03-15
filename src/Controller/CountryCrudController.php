<?php

namespace App\Controller;

use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;


class CountryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Country::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('commonName', 'Nombre Común'),
            TextField::new('officialName', 'Nombre Oficial'),
            TextareaField::new('nativeData', 'Información Nativa')->hideOnIndex(),
            TextField::new('tld', 'Top-Level Domain')->hideOnIndex(),
            TextField::new('cca2', 'CCA2'),
            TextField::new('ccn3', 'CCN3'),
            TextField::new('cca3', 'CCA3'),
            TextField::new('cioc', 'CIOC'),
            BooleanField::new('independent', 'Independiente'),
            TextField::new('status', 'Estado'),
            BooleanField::new('unMember', 'Miembro de la ONU'),
            TextareaField::new('currencies', 'Monedas')->hideOnIndex(),
            TextareaField::new('callingCode', 'Código de Llamada')->hideOnIndex(),
            TextField::new('capital', 'Capital'),
            TextField::new('altSpellings', 'Variantes de Nombre')->hideOnIndex(),
            TextField::new('region', 'Región'),
            TextField::new('subregion', 'Subregión'),
            TextareaField::new('languages', 'Idiomas')->hideOnIndex(),
            TextareaField::new('translations', 'Traducciones')->hideOnIndex(),
            TextField::new('geographicCoords', 'Coordenadas Geográficas')->hideOnIndex(),
            BooleanField::new('landLocked', 'Landlocked'),
            TextField::new('borders', 'Fronteras')->hideOnIndex(),
            NumberField::new('area', 'Área'),
            TextField::new('demonyms', 'Gentilicios')->hideOnIndex(),
            TextField::new('flag', 'Bandera')->hideOnIndex(),
            TextField::new('maps', 'Mapas')->hideOnIndex(),
            TextField::new('population', 'Población'),
            TextField::new('gini', 'Gini')->hideOnIndex(),
            TextField::new('fifa', 'FIFA')->hideOnIndex(),
            TextField::new('car', 'Automóvil')->hideOnIndex(),
            TextField::new('timeZones', 'Zonas Horarias')->hideOnIndex(),
            TextField::new('continents', 'Continentes'),
            TextareaField::new('flags', 'Banderas')->hideOnIndex(),
            TextField::new('coatOfArms', 'Escudo de Armas')->hideOnIndex(),
            TextField::new('startOfWeek', 'Inicio de Semana')->hideOnIndex(),
            TextField::new('capitalCoords', 'Coordenadas de la Capital')->hideOnIndex(),
            TextField::new('postalCodeData', 'Datos del Código Postal')->hideOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('País')
            ->setEntityLabelInPlural('Paises')
            ->setSearchFields(['commonName', 'officialName', 'cca2', 'cca3'])
            ->setDefaultSort(['commonName' => 'ASC']);
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('commonName')
            ->add('region')
            ->add('subregion')
            ->add('independent')
            ->add('unMember')
            ->add('timeZones')
            ->add('continents');
    }
}
