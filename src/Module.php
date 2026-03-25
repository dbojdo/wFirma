<?php

namespace Webit\WFirmaSDK;

use Webit\WFirmaSDK\Entity\Entity;

final class Module
{
    /** @var string */
    private $name;

    /** @var string */
    private $recordName;

    /** @var string */
    private $entityClass;

    /** @var string[] */
    private $actions;

    /** @var Module[] */
    private static $modules;

    /**
     * @param string $name
     * @param string $recordName
     * @param string $entityClass
     * @param string[] $actions
     */
    private function __construct($name, $recordName, $entityClass, array $actions)
    {
        $this->name = $name;
        $this->recordName = $recordName;
        $this->entityClass = $entityClass;
        $this->actions = $actions;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function entityName()
    {
        return $this->recordName;
    }

    /**
     * @return string
     */
    public function entityClass()
    {
        return $this->entityClass;
    }

    /**
     * @return bool
     */
    public function isActionAllowed($action)
    {
        return in_array($action, $this->actions);
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Module
     */
    public static function invoices()
    {
        return self::module('invoices');
    }

    /**
     * @return Module
     */
    public static function goods()
    {
        return self::module('goods');
    }

    /**
     * @return Module
     */
    public static function vatCodes()
    {
        return self::module('vat_codes');
    }

    /**
     * @return Module
     */
    public static function declarationCountries()
    {
        return self::module('declaration_countries');
    }

    /**
     * @return Module
     */
    public static function series()
    {
        return self::module('series');
    }

    /**
     * @return Module
     */
    public static function contractors()
    {
        return self::module('contractors');
    }

    /**
     * @return Module
     */
    public static function companyAccounts()
    {
        return self::module('company_accounts');
    }

    /**
     * @return Module
     */
    public static function translationLanguages()
    {
        return self::module('translation_languages');
    }

    /**
     * @return Module
     */
    public static function invoiceDescriptions()
    {
        return self::module('invoice_descriptions');
    }

    /**
     * @return Module
     */
    public static function invoiceDeliveries()
    {
        return self::module('invoice_deliveries');
    }

    /**
     * @return Module
     */
    public static function payments()
    {
        return self::module('payments');
    }

    /**
     * @return Module
     */
    public static function notes()
    {
        return self::module('notes');
    }

    /**
     * @return Module
     */
    public static function tags()
    {
        return self::module('tags');
    }

    /**
     * @return Module
     */
    public static function taxregisters()
    {
        return self::module('taxregisters');
    }

    /**
     * @param string $module
     * @return Module
     */
    private static function module($module)
    {
        self::initialise();
        if (isset(self::$modules[$module])) {
            return self::$modules[$module];
        }

        throw new \OutOfBoundsException(sprintf('Module "%s" is not registered.', $module));
    }

    /**
     * @param Entity $entity
     * @return null|Module
     */
    public static function moduleOfEntity(Entity $entity)
    {
        self::initialise();
        foreach (self::$modules as $module) {
            if (is_a($entity, $module->entityClass())) {
                return $module;
            }
        }

        return null;
    }

    private static function initialise()
    {
        if (self::$modules) {
            return;
        }

        self::$modules['invoices'] = new self(
            'invoices',
            'invoice',
            'Webit\WFirmaSDK\Invoices\Invoice',
            array(
                'find',
                'findALl',
                'get',
                'download',
                'send',
                'fiscalize',
                'unfiscalize',
                'add',
                'edit',
                'delete'
            )
        );

        self::$modules['goods'] = new self(
            'goods',
            'good',
            'Webit\WFirmaSDK\Goods\Good',
            array(
                'find',
                'get',
                'add',
                'edit',
                'delete'
            )
        );

        self::$modules['vat_codes'] = new self(
            'vat_codes',
            'vat_code',
            'Webit\WFirmaSDK\Vat\VatCode',
            array(
                'find',
                'get'
            )
        );

        self::$modules['declaration_countries'] = new self(
            'declaration_countries',
            'declaration_country',
            'Webit\WFirmaSDK\DeclarationCountries\DeclarationCountry',
            array(
                'get',
                'find'
            )
        );

        self::$modules['series'] = new self(
            'series',
            'series',
            'Webit\WFirmaSDK\Series\Series',
            array(
                'add',
                'edit',
                'delete',
                'find',
                'get'
            )
        );

        self::$modules['contractors'] = new self(
            'contractors',
            'contractor',
            'Webit\WFirmaSDK\Contractors\Contractor',
            array(
                'add',
                'edit',
                'delete',
                'find',
                'get'
            )
        );

        self::$modules['company_accounts'] = new self(
            'company_accounts',
            'company_account',
            'Webit\WFirmaSDK\CompanyAccounts\CompanyAccount',
            array(
                'find',
                'get'
            )
        );

        self::$modules['translation_languages'] = new self(
            'translation_languages',
            'translation_language',
            'Webit\WFirmaSDK\TranslationLanguages\TranslationLanguage',
            array(
                'find',
                'get'
            )
        );

        self::$modules['invoice_descriptions'] = new self(
            'invoice_descriptions',
            'invoice_description',
            'Webit\WFirmaSDK\InvoiceDescriptions\InvoiceDescription',
            array(
                'find',
                'get'
            )
        );

        self::$modules['invoice_deliveries'] = new self(
            'invoice_deliveries',
            'invoice_delivery',
            'Webit\WFirmaSDK\InvoiceDeliveries\InvoiceDelivery',
            array(
                'find',
                'get',
                'add',
                'delete'
            )
        );

        self::$modules['payments'] = new self(
            'payments',
            'payment',
            'Webit\WFirmaSDK\Payments\Payment',
            array(
                'find',
                'edit',
                'get',
                'add',
                'delete'
            )
        );

        self::$modules['notes'] = new self(
            'notes',
            'note',
            'Webit\WFirmaSDK\Notes\Note',
            array(
                'find',
                'get',
                'add',
                'edit',
                'delete'
            )
        );

        self::$modules['tags'] = new self(
            'tags',
            'tag',
            'Webit\WFirmaSDK\Tags\Tag',
            array(
                'find',
                'get',
                'add',
                'edit',
                'delete'
            )
        );

        self::$modules['taxregisters'] = new self(
            'taxregisters',
            'taxregister',
            'Webit\WFirmaSDK\TaxRegisters\TaxRegister',
            array(
                'get'
            )
        );
    }
}
