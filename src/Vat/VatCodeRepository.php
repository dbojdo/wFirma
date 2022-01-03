<?php

namespace Webit\WFirmaSDK\Vat;

class VatCodeRepository {
    private static $initialized = false;
    private static $vatCodesById = [];
    private static $vatCodesByCode = [];

    public static function initialize() {
        if(self::$initialized) {
            return;
        }
        self::register(VatCode::VAT23());
        self::register(VatCode::VAT22());
        self::register(VatCode::VAT8());
        self::register(VatCode::VAT7());
        self::register(VatCode::VAT5());
        self::register(VatCode::VAT3());
        self::register(VatCode::ZW());
        self::register(VatCode::NP());
        self::register(VatCode::NPUE());
        self::register(VatCode::VAT_BUYER());
        self::register(VatCode::WDT());
        self::register(VatCode::EXP());
        self::register(VatCode::VAT0());
        self::$initialized = true;
    }

    public static function register(VatCode $vatCode) {
        self::$vatCodesById[$vatCode->id()->id()] = $vatCode;
        self::$vatCodesByCode[$vatCode->code()] = $vatCode;
    }

    public static function fromVatId(int $id): VatCode {
        self::initialize();
        return self::$vatCodesById[$id] ?? null;
    }

    public static function fromVatCode(string $code): VatCode {
        self::initialize();
        return self::$vatCodesByCode[$code] ?? null;
    }

    public static function A(): VatCode {
        return self::fromVatCode('23');
    }

    public static function B(): VatCode {
        return self::fromVatCode('8');
    }

    public static function C(): VatCode {
        return self::fromVatCode('5');
    }

    public static function D(): VatCode {
        return self::fromVatCode('0');
    }

    public static function E(): VatCode {
        return self::fromVatCode('ZW');
    }
}
