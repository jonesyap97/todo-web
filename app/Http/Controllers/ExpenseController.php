<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Http\Requests\ExpensesRequest;

class ExpenseController extends Controller
{
    public function showMainPage()
    {
        $expense_list = Expense::latest()->get();
        $cost = Expense::sum('cost');

        return view('expensespage', ['expense_list' => $expense_list, 'total_cost' => $cost,]);
    }

    public function newExpensesPage()
    {
        return view('createExpenses');
    }

    public function storeExpenses(ExpensesRequest $request)
    {
        //dd($request);
        $expense = new Expense();
        $expense->description = $request->description;
        $expense->cost = (float) $request->cost;
        $expense->save();
        return redirect()->route('expenses');
    }

    public function delete(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses');
    }
}
