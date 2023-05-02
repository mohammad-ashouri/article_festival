function showname(id){
    article_file_url=document.getElementById('article_file_url_'+id);
    document.getElementById('article_file_url_Name_'+id).innerHTML=article_file_url.files.item(0).name;
}