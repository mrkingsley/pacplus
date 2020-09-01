<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIncomeRequest;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Hardware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HardwareController extends Controller
{
    public function index()
    {
       

        $incomes = Income::all();

        return view('incomes.index', compact('incomes'));
    }

    public function create()
    {
       

        $income_categories = IncomeCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.incomes.create', compact('income_categories'));
    }

    public function store(StoreIncomeRequest $request)
    {
        $income = Income::create($request->all());

        return redirect()->route('admin.incomes.index');
    }

    public function edit(Income $income)
    {
       

        $income_categories = IncomeCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $income->load('income_category', 'created_by');

        return view('admin.incomes.edit', compact('income_categories', 'income'));
    }

    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $income->update($request->all());

        return redirect()->route('admin.incomes.index');
    }

    public function show(Income $income)
    {
        

        $income->load('income_category', 'created_by');

        return view('admin.incomes.show', compact('income'));
    }

    public function destroy(Income $income)
    {

        $income->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncomeRequest $request)
    {
        Income::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
