# wFirma API

High level implementation of [wFirma API](https://doc.wfirma.pl). Provides object oriented SDK to operate on the most of wFirma modules.

## Installation

Use composer:

```bash
composer require webit/w-firma-api
```

For PHP 5.4 and 7.0 use ^1.0 version.

## Usage

The current version of the package provides full support for the following modules:

 * [company_accounts](https://doc.wfirma.pl/#h3-company-accounts)
 * [contractors](https://doc.wfirma.pl/#h3-contractors)
 * [declaration_countries](https://doc.wfirma.pl/#h3-declaration-countries)
 * [invoice_deliveries](https://doc.wfirma.pl/#h3-invoice-descriptions)
 * [invoice_descriptions](https://doc.wfirma.pl/#h3-invoicecontents#h3-invoice-descriptions)
 * [invoicecontents](https://doc.wfirma.pl/#h3-invoicecontents)
 * [invoices](https://doc.wfirma.pl/#h3-invoices)
 * [payments](https://doc.wfirma.pl/#h3-payments)
 * [notes](https://doc.wfirma.pl/#h3-notes)
 * [series](https://doc.wfirma.pl/#h3-series)
 * [tags](https://doc.wfirma.pl/#h3-tags)
 * [translation_languages](https://doc.wfirma.pl/#h3-translation-languages)
 * [vat_contents](https://doc.wfirma.pl/#h3-vat-contents)
 * [vat_codes](https://doc.wfirma.pl/#h3-vat-codes)
 * [vat_moss_details](https://doc.wfirma.pl/#h3-vat-moss-details)

Basic support for the following modules:

 * [taxregisters](https://doc.wfirma.pl/#030217b9-8adf-489e-86d4-ed3f50249dac) ([details](#taxregistersapi))

### Configure Annotation Registry

This is not needed if you use AnnotationRegistry 2.0.

```php
<?php
use Doctrine\Common\Annotations\AnnotationRegistry;
$loader = include __DIR__.'/vendor/autoload.php'; // composer's autoload.php
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
```

### Authentication

The library supports:
 * `ApiKeysAuth`
 * `BasicAuth` (deprecated)

#### ApiKeyAuth

```php
<?php
use Webit\WFirmaSDK\Auth\ApiKeysAuth;

$auth = new ApiKeysAuth('your-access-key', 'your-secret-key', 'your-app-key', $companyId = 1123); // $companyId is optional
```

To get your API Keys follow the official documentation: [https://doc.wfirma.pl/#autoryzacja](https://doc.wfirma.pl/#autoryzacja)  

#### BasicAuth (deprecated)

This method will not be supported anymore by wFirma.

```php
<?php
use Webit\WFirmaSDK\Auth\BasicAuth;

$auth = new BasicAuth('your-user-name', 'your-password', $companyId = 1123); // $companyId is optional
```

### ApiFactory

In order to create API for given module use ***ModuleApiFactory***.

```php
<?php

use Webit\WFirmaSDK\Entity\ModuleApiFactory;
use Webit\WFirmaSDK\Entity\EntityApiFactory;

$entityApiFactory = new EntityApiFactory();
$entityApi = $entityApiFactory->create($auth);

$apiFactory = new ModuleApiFactory($entityApi);
```


### Module APIs

Every main module has it's own instance of the API exposing supported methods.

* **Company Accounts**: find, findAll, get, count,
* **Contractors**: add, edit, delete, find, findAll, get, count
* **Declaration Countries**: find, findAll, get, count
* **Goods**: add, edit, delete, find, get
* **Invoice Deliveries**: add, delete, find, findAll, get, count
* **Invoice Descriptions**: find, findAll, get, count
* **Invoices**: add, edit, delete, find, findAll, get, count, fiscalise, unfiscalise, download, send
* **Payments**: add, edit, delete, find, findAll, get
* **Notes**: add, edit, delete, find, findAll, get, count
* **Series**: add, edit, delete, find, findAll, get, count
* **Tags**: add, edit, delete, find, findAll, get, count
* **TranslationLanguages**: find, findAll, get, count
* **VatCodes**: find, findAll, get, count
* **TaxRegisters**: get

### Find / FindAll / Count APIs

APIs exposing **find** / **findAll** / **count** method takes and optional **Parameters** argument.

```php
<?php
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Entity\Parameters\Conditions;
use Webit\WFirmaSDK\Entity\Parameters\Order;
use Webit\WFirmaSDK\Entity\Parameters\Pagination;
use Webit\WFirmaSDK\Entity\Parameters\Fields;

$parameters = Parameters::findParameters(
    Conditions::or(
        Conditions::eq('name', 'FA/'),
        Conditions::gt('id', '20')
    ),
    Order::ascending("name")->thenDescending("created"), // optional - ordering
    Pagination::create(20, 2), // optional - limit, page no
    Fields::fromArray(["id", "name"]) // optional - subset of fields to select
);

$seriesApi = $apiFactory->seriesApi();

$series = $seriesApi->find($parameters); // returns array of 20 Series (page 2)

// returns EntityIterator, allows to iterate over all the matching Series loaded in batches of 20
$series = $seriesApi->findAll($parameters);
/**
* @var int $i
* @var \Webit\WFirmaSDK\Series\Series $seriesItem */
foreach ($series as $i => $seriesItem) {
    // do some stuff on ALL the matching elements
}

$seriesCount = $seriesApi->count($parameters); // return number of matching series

```

### InvoicesApi

```php
<?php
use Webit\WFirmaSDK\Contractors\Contractor;
use Webit\WFirmaSDK\Contractors\InvoiceAddress;
use Webit\WFirmaSDK\Invoices\InvoicesContent;
use Webit\WFirmaSDK\Goods\GoodId;
use Webit\WFirmaSDK\Invoices\Payment;
use Webit\WFirmaSDK\Payments\PaymentMethod;

/** @var \Webit\WFirmaSDK\Invoices\InvoicesApi $api */
$api = $apiFactory->invoicesApi();

// add a new invoice
$invoice = \Webit\WFirmaSDK\Invoices\Invoice::forContractor(
    new Contractor(
        'client name',
        'alt name',
        '1234565432', // vat no
        null, // regon
        new InvoiceAddress(
            'ul. Mokra 12',
            '01-006',
            'Warszawa',
            'PL'
        )
    ),
    Payment::create(PaymentMethod::transfer())
);

$invoice->addInvoiceContent(
    InvoicesContent::fromGoodId(
        GoodId::create(123),
        3,
        123.32,
        23
    )
);

$invoice->addInvoiceContent(
    InvoicesContent::fromName(
        'some stuff',
        'szt.',
        3,
        123.32,
        23
    )
);

$invoice = $api->add($invoice);

// get invoice by id
$invoice = $api->get(\Webit\WFirmaSDK\Invoices\InvoiceId::create(123));

// edit the invoice
$invoice->changePayment(
    $invoice->payment()->withPaymentDate(new \DateTime())
);

// do some more edits
$invoice = $api->edit($invoice);

// delete the invoice
$api->delete($invoice->id());
```

### ContractorsApi

```php

<?php
use Webit\WFirmaSDK\Contractors\Contractor;

/** @var \Webit\WFirmaSDK\Contractors\ContractorsApi $api */
$api = $apiFactory->contractorsApi($auth);

// add a new contractor
$contractor = new Contractor('my-new-contractor');
$contractor = $api->add($contractor);

// edit the contractor
$contractor->rename('new name', 'new alt name');
$contractor = $api->edit($contractor);

// delete the contractor
$api->delete($contractor->id());

// get contractor by id
$contractor = $api->get(\Webit\WFirmaSDK\Contractors\ContractorId::create(123));

```

### TaxRegistersApi

```php

<?php
use Webit\WFirmaSDK\TaxRegisters\TaxRegistersId;

$entityApiFactory = new EntityApiFactory();
$entityApi = $entityApiFactory->create($auth);
$apiFactory = new ModuleApiFactory($entityApi);
$taxRegisterApi = $apiFactory->taxRegistersApi();

// single TaxRegister doesn't have id
// new id for specific month (February)
$taxRegisterId = new TaxRegistersId(2024, 2);

// or new id for a year
$taxRegisterId = new TaxRegistersId(2024);

// get tax registers
/** @var \Webit\WFirmaSDK\TaxRegisters\TaxRegister[] $taxRegisters */
$taxRegisters = $taxRegisterApi->get($taxRegisterId);

```

## Further development

Feel free to add any other modules support.

## Getting VatCodeId from VAT Rate code by VatCodeIdRepository

### With custom static map provided

```php

use Webit\WFirmaSDK\Vat\Repository\VatCodeIdRepositoryFactory;

$repository = VatCodeIdRepositoryFactory::createWithMap(
  ['23' => 222, '8' => 223] // provide your static ID mapping
);

$repository->getByCode('23'); // returns new VatCodeId(222);
```

### With cached map provided by API
Please note you need to add `psr/simple-cache-implementation` to your `composer.json`.
We suggest `symfony/cache` in the example below.

```php

use Webit\WFirmaSDK\Vat\Repository\VatCodeIdRepositoryFactory;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

$repository = VatCodeIdRepositoryFactory::createWithApi(
  $api = $apiFactory->vatCodesApi(),
  new Psr16Cache(new FilesystemAdapter()) // use cache adapter of your choice (no cache by default)
);

$repository->getByCode('23'); // returns new VatCodeId(222);
```

## Tests

```bash
cp phpunit.xml.dist phpunit.xml
vim phpunit.xml // edit your username and password

docker-compose run --rm composer
docker-compose run --rm phpunit
```
