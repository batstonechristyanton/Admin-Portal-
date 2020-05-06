<?php 

class Sale{
    protected $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder) {
        $this->queryBuilder = $queryBuilder;
    }

    public function totalTax() {

        return array_flatten($this->queryBuilder->select(['SUM(tax) as TotalTax'], 'sales_data_2')
            ->get());


    }   

    public function topSale()
    {
        # code...
        return array_flatten(
            $this->queryBuilder->select(['cust_city, SUM(grand_total) as TopSales'], 'sales_data_2')
            ->where('cust_city', 'Toronto')
            ->get());
    }
    public function total()
    {
        return array_flatten($this->queryBuilder->select(['ROUND(SUM(grand_total)) as total'], 'sales_data_2')
        ->get());
    }

    public function tableTotalSales()
    {   //select cust_province as province,cust_city, sum(grand_total) as TotalSales from sales_data_2 GROUP By cust_city

        return $this->queryBuilder->select(['cust_province as province','cust_city as city','SUM(grand_total) as total'], 'sales_data_2')
        ->groupby('cust_city')
        ->orderBy('SUM(grand_total)', SORT_BY)
        ->get();
    }

    public function getAll()
    {
        return $this->queryBuilder->select(['purchase_date', 'tax', 'grand_total', 'shipping'], 'sales_data_2')->orderBy('purchase_date', $_GET['sortBy'])->get();
    }

}