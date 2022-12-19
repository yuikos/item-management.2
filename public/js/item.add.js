function pickcategory()
{
    let obj = document.getElementById('main_category');
    let index = obj.selectedIndex;//選択した選択肢のindex番号取得
    let value = main_category.options[index].value;//選択したoptionのvalueの値を取得
    $.ajax({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },//headersを書き忘れるとエラーになる
        type:"POST",//リクエストタイプ(postでも可)
        url:"/api/items/add/ajax",//指定したコントローラーに付随するurl
        data:{"value":value},//laravelに渡すデータ
        dataType:"json" //データの取得タイプ
        
    }).done(function(data){
        //非同期通信に成功したときに行いたい処理
        //元からあるselectのoptionを削除
        console.log('done');
        let select = document.getElementById('sub_category');
        let options = select.options
        for(let i = options.length -1; 0 <= i; --i ){
            select.remove(i);
        }
        //laravel内で処理された結果がdataに入って返ってくる
        for(let i in data){
            $("#sub_category").append("<option value=" + data[i] + ">" + data[i] + "</option>");
        }
    }).fail(function(){
         //失敗した時の処理
        alert('非同期に失敗しました');
    });
}