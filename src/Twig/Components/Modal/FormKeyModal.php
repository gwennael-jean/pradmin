<?php

namespace App\Twig\Components\Modal;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveListener;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(template: '.components/modals/modal-form-keys.html.twig')]
final class FormKeyModal
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public bool $opened = false;

    #[LiveProp(writable: true)]
    public string $test = '1234';

    #[LiveListener('openModal')]
    public function open()
    {
        $this->opened = true;
    }
}
