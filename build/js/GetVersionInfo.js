function getInfo(id) {
    $.ajax({
        url: "build/ajax/GetVersionInfo.php",
        type: "GET",
        data: {
            id: id,
        },
        success: function (response) {
            //Version_Info
            $("#editedMagInfoId").val(response.mag_info_id).trigger('change');
            $("#editedVersionID").val(response.mag_versions_id);
            $("#editedPublicationPeriodYear").val(response.publication_period_year);
            $("#editedPublicationPeriodNumber").val(response.publication_period_number);
            $("#editedPublicationNumber").val(response.publication_number);
            $("#editedPublicationYear").val(response.publication_year);
            $("#editedNumberOfPages").val(response.number_of_pages);
            $("#editedNumberOfArticles").val(response.number_of_articles);
            $(".editedCoverUrl").attr("href", response.cover_url).attr("id", 'no-link');
            $(".editedFileUrl").attr("href", response.file_url).attr("id", 'no-link');
        }
    })
}
