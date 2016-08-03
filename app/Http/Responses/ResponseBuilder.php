<?php

namespace App\Http\Responses;

use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Item as FractalItem;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Serializer\JsonApiSerializer;

class ResponseBuilder
{
    /**
     * Manager instance.
     *
     * @var League\Fractal\Manager
     */
    protected $manager;

    /**
     * Create new instance of ResponseBuilder.
     *
     * @param  League\Fractal\Manager $manager
     *
     * @return void
     */
    function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Create a new json response from a collection resource.
     *
     * @param  Collection                         $collection
     * @param  League\Fractal\TransformerAbstract $transformer
     * @param  string                             $key
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function withCollection($collection, $transformer, $key = 'data')
    {
        $resource = new FractalCollection($collection, $transformer, $key);

        return response()->json($this->build($resource));
    }

    /**
     * Create a new json response from an item resource.
     *
     * @param  mixed                              $item
     * @param  League\Fractal\TransformerAbstract $transformer
     * @param  string                             $key
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function withItem($item, $transformer, $key = 'data')
    {
        $resource = new FractalItem($item, $transformer, $key);

        return response()->json($this->build($resource));
    }

    /**
     * Create a new json response from a paginator resource.
     *
     * @param  mixed                              $paginator
     * @param  League\Fractal\TransformerAbstract $transformer
     * @param  string                             $key
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function withPaginator($paginator, $transformer, $key = 'data')
    {
        $resource = new FractalCollection($paginator->getCollection(), $transformer, $key);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return response()->json($this->build($resource));
    }

    /**
     * Create a new no content response.
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function noContent()
    {
        return response('', 204);
    }

    /**
     * Build the response data.
     *
     * @param  mixed $data
     *
     * @return Illuminate\Http\JsonResponse
     */
    protected function build($data)
    {
        $this->manager->setSerializer(new JsonApiSerializer);

        return $this->manager->createData($data)->toArray();
    }

}
