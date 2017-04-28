<div id="download_dialog" title="下載檔案">
    <form>
        <label>請下載 Excel</label>
        <br>
        <br>
        @if($where =='account_class')
            <input type="button" value="下載會計大項"  onclick="javascript:self.location.href='/excel/subclass/export'" >
            <br>
            <br>
            <input type="button" value="下載會計科目"  onclick="javascript:self.location.href='/excel/account_class/export'" >
        @else
            <input type="button" value="下載產品"  onclick="javascript:self.location.href='/excel/product/export'" >
            <br>
            <br>
            <input type="button" value="下載產品訂單"  onclick="javascript:self.location.href='/excel/product_order/export'" >
        @endif

    </form>
</div>