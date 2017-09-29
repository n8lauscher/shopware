<?php declare(strict_types=1);

namespace Shopware\Framework\Write\Resource;

use Shopware\Context\Struct\TranslationContext;
use Shopware\Framework\Write\Field\IntField;
use Shopware\Framework\Write\Field\StringField;
use Shopware\Framework\Write\Flag\Required;
use Shopware\Framework\Write\Resource;

class CoreRewriteUrlsResource extends Resource
{
    protected const ORG_PATH_FIELD = 'orgPath';
    protected const PATH_FIELD = 'path';
    protected const MAIN_FIELD = 'main';
    protected const SUBSHOPID_FIELD = 'subshopID';

    public function __construct()
    {
        parent::__construct('s_core_rewrite_urls');

        $this->fields[self::ORG_PATH_FIELD] = (new StringField('org_path'))->setFlags(new Required());
        $this->fields[self::PATH_FIELD] = (new StringField('path'))->setFlags(new Required());
        $this->fields[self::MAIN_FIELD] = (new IntField('main'))->setFlags(new Required());
        $this->fields[self::SUBSHOPID_FIELD] = (new IntField('subshopID'))->setFlags(new Required());
    }

    public function getWriteOrder(): array
    {
        return [
            \Shopware\Framework\Write\Resource\CoreRewriteUrlsResource::class,
        ];
    }

    public static function createWrittenEvent(array $updates, TranslationContext $context, array $errors = []): \Shopware\Framework\Event\CoreRewriteUrlsWrittenEvent
    {
        $event = new \Shopware\Framework\Event\CoreRewriteUrlsWrittenEvent($updates[self::class] ?? [], $context, $errors);

        unset($updates[self::class]);

        if (!empty($updates[\Shopware\Framework\Write\Resource\CoreRewriteUrlsResource::class])) {
            $event->addEvent(\Shopware\Framework\Write\Resource\CoreRewriteUrlsResource::createWrittenEvent($updates, $context));
        }

        return $event;
    }
}