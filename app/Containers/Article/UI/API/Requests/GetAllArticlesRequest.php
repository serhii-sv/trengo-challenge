<?php

namespace App\Containers\Article\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetAllArticlesRequest.
 */
class GetAllArticlesRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    // protected $transporter = \App\Ship\Transporters\DataTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        // 'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
             'categories' => 'sometimes|json',
             'datetime_from' => 'sometimes|date_format:Y-m-d H:i:s',
             'datetime_to' => 'sometimes|date_format:Y-m-d H:i:s',

             'sort_by_views' => 'sometimes|in:0,1',
             'sort_by_views_order' => 'sometimes|in:asc,desc',
             'sort_by_views_date' => 'sometimes|date_format:Y-m-d',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
