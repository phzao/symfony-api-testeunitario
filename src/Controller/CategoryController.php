<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Interfaces\CategoryInterface;
use App\Repository\Interfaces\CategoryRepositoryInterface;;

use App\Services\Validation\ValidationService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CategoryController
 * @package App\Controller
 */
class CategoryController extends APIController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $repository;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    /**
     * @Route("/categories", name="category_save", methods={"POST"})
     * @param Request           $request
     * @param ValidationService $validationService
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function save(Request $request,
                         ValidationService $validationService)
    {
        try {

            $data     = $request->request->all();
            $category = new Category();
            $category->setAttributes($data);
            $validationService->validating($category);

            return $this->respond($request->request->all());
        } catch (UnprocessableEntityHttpException $exception) {

            return $this->respondValidationError($exception->getMessage());
        }
    }
}