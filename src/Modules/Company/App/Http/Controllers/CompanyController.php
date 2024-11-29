<?php

namespace Modules\Company\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Company\App\Models\Company;
use Modules\Company\App\Services\ImageUploadService;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class CompanyController
 * @package Modules\Company\App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * @var \Modules\Company\App\Services\ImageUploadService
     */
    protected $imageUploadService;

    /**
     * @param \Modules\Company\App\Services\ImageUploadService $imageUploadService
     */
    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('company::admin.index', compact('companies'));
    }
    /**
     * Display a listing of the resource.
     */
    public function general(Request $request)
    {
        $industrySearchParams = $request->input('industry');

        $locationSearchParams = $request->input('location');

        $sizeCompanySearchParams = $request->input('company_size');

        $companies = Company::with(['jobs', 'cclasscontact'])->orderBy('id', 'asc');
        
        if (!empty($industrySearchParams)) {
            $industrySearchParams = explode('+', $industrySearchParams);  
            
            $companies  =  $companies->where(function ($query) use ($industrySearchParams) {
                foreach ($industrySearchParams as $industry) {
                    $query->orWhere('industry', 'like', '%' . trim($industry) . '%');
                }
            });

        }

        if (!empty($locationSearchParams)) {
            $locationSearchParams = explode('+', $locationSearchParams);  
            
            $companies  =  $companies->where(function ($query) use ($locationSearchParams) {
                foreach ($locationSearchParams as $location) {
                    $query->orWhere('location', 'like', '%' . trim($location) . '%');
                }
            });

        }

        if (!empty($sizeCompanySearchParams)) {
            $sizeCompanySearchParams = explode(',', $sizeCompanySearchParams);  
            
            $companies  =  $companies->where(function ($query) use ($sizeCompanySearchParams) {
                foreach ($sizeCompanySearchParams as $sizeParam) {
                    if($sizeParam == '1001') {
                        $query->orWhere('company_size','>', $sizeParam);
                    } else {
                        $query->orWhereBetween('company_size', explode('-', $sizeParam));
                    }
                }
            });


        }

        $totalCompanies = $companies->count();

        $companies = $companies->paginate(10);

        return view('company::general-company', compact('companies', 'totalCompanies'));;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'dashboard';
        return view('company::admin.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');

            if ($image->isValid()) {
                $imagePath = $this->imageUploadService->uploadLogo($image);
                if ($imagePath) {
                    $request->merge(['logo_image' => $imagePath]);
                } else {
                    return redirect()->back()->with('error', 'Invalid Image Format!');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid File!');
            }
        }
        Company::create($request->all());

        return redirect()->route('company.index');
    }
    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('company::admin.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('company::admin.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');

            if ($image->isValid()) {
                $imagePath = $this->imageUploadService->uploadLogo($image);
                if ($imagePath) {
                    $request->merge(['logo_image' => $imagePath]);
                } else {
                    return redirect()->back()->with('error', 'Invalid Image Format!');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid File!');
            }
        }
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index');
    }

    // /**
    //  * @param $id
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function toggleFollow($id)
    // {
    //     $company = Company::findOrFail($id);

    //     if (request()->action === 'follow') {
    //         $company->number_of_followers += 1;
    //     } else {
    //         $company->number_of_followers -= 1;
    //     }

    //     $company->save();

    //     return response()->json(['number_of_followers' => $company->number_of_followers]);
    // }

    // public function uploadLogo(Request $request)
    // {
    //     $request->validate([
    //         'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);
    //     if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
    //         $logoPath = $request->file('logo')->store('company/logos', 'public');

    //         return response()->json([
    //             'success' => true,
    //             'logo_path' => $logoPath,
    //         ]);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'File upload failed!',
    //     ]);
    // }
}
