<?php
    
    namespace App\Http\Controllers\Admin;
    
    use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
    use App\Http\Requests\StoreRequest as StoreRequest;
    use App\Http\Requests\StoreRequest as UpdateRequest;
    use Backpack\CRUD\CrudPanel;
    
    /**
     * Class StoreCrudController
     * @package App\Http\Controllers\Admin
     * @property-read CrudPanel $crud
     */
    class StoreCrudController extends CrudController
    {
        public function setup()
        {
            /*
            |--------------------------------------------------------------------------
            | CrudPanel Basic Information
            |--------------------------------------------------------------------------
            */
            $this->crud->setModel('App\Models\Store');
            $this->crud->setRoute(config('backpack.base.route_prefix') . '/store');
            $this->crud->setEntityNameStrings('store', 'stores');
            
            /*
            |--------------------------------------------------------------------------
            | CrudPanel Configuration
            |--------------------------------------------------------------------------
            */
            
            // TODO: remove setFromDb() and manually define Fields and Columns
            //$this->crud->setFromDb();
            $this->crud->setColumns(['name', 'url','countries','payment_methods']);
            $this->crud->addField([
                                      'name'  => 'name',
                                      'type'  => 'text',
                                      'label' => "Name of the store"
                                  ]);
            $this->crud->addField([
                                      'name'  => 'url',
                                      'type'  => 'text',
                                      'label' => "URL of the store"
                                  ]);
            $this->crud->addField([
                                      'name'  => 'countries',
                                      'type'  => 'select2_from_array',
                                      'label' => "Deliverable Countries",
                                      'options' => ['CH'=>'Switzerland','DE' => 'Germany', 'AT'=> "Austria"],
                                      'allows_null' => false,
                                      'default' => 'CH',
                                      'allows_multiple' => true
                                  ]);
            $this->crud->addField([
                                      'name'  => 'payment_methods',
                                      'type'  => 'select2_from_array',
                                      'label' => "Available Payment Methods",
                                      'options' => ['manual_bill'=>'Manual Billing','credit_card' => 'Credit Cards', 'paypal'=> "PayPal",'klarna' => 'Klarna Billing','sofort' => 'SOFORT Transactions','twint'=>'TWINT'],
                                      'allows_null' => false,
                                      'allows_multiple' => true
                                  ]);
    
    
            // add asterisk for fields that are required in StoreRequest
            $this->crud->setRequiredFields(StoreRequest::class, 'create');
            $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        }
        
        public function store(StoreRequest $request)
        {
            // your additional operations before save here
            $redirect_location = parent::storeCrud($request);
            // your additional operations after save here
            // use $this->data['entry'] or $this->crud->entry
            return $redirect_location;
        }
        
        public function update(UpdateRequest $request)
        {
            // your additional operations before save here
            $redirect_location = parent::updateCrud($request);
            // your additional operations after save here
            // use $this->data['entry'] or $this->crud->entry
            return $redirect_location;
        }
    }
