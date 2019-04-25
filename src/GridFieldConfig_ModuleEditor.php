<?php

namespace Voyage\Modulator;

use GridFieldConfig;
use GridFieldButtonRow;
use GridFieldAddNewButton;
use GridFieldToolbarHeader;
use GridFieldSortableHeader;
use GridFieldFilterHeader;
use GridFieldDataColumns;
use GridFieldEditButton;
use GridFieldDeleteAction;


/**
 * Class GridFieldConfig_ModuleEditor.
 */
class GridFieldConfig_ModuleEditor extends GridFieldConfig
{
    public function __construct()
    {
        parent::__construct();

        $this->addComponent(new GridFieldButtonRow('before'));
        $this->addComponent(new GridFieldAddNewButton('buttons-before-left'));
        $this->addComponent(new GridFieldToolbarHeader());
        $this->addComponent($sort = new GridFieldSortableHeader());
        $this->addComponent($filter = new GridFieldFilterHeader());
        $this->addComponent(new GridFieldModuleColumns());
        $this->addComponent(new GridFieldDataColumns());
        $this->addComponent(new GridFieldEditButton());
        $this->addComponent(new GridFieldDeleteAction());
        $this->addComponent(new PageModuleVersionedDataObjectDetailsForm());

        $sort->setThrowExceptionOnBadDataType(false);
        $filter->setThrowExceptionOnBadDataType(false);

        $this->extend('updateConfig');
    }
}
