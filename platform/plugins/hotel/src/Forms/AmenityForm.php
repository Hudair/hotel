<?php

namespace Botble\Hotel\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Hotel\Forms\Fields\FontIconField;
use Botble\Hotel\Http\Requests\AmenityRequest;
use Botble\Hotel\Models\Amenity;

class AmenityForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Amenity)
            ->setValidatorClass(AmenityRequest::class)
            ->addCustomField('fontIcon', FontIconField::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('icon', 'fontIcon', [
                'label'         => trans('plugins/hotel::amenity.icon'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => 'fas fa-check',
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
