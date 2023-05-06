const updateJournal = document.querySelector('#updateJournal');
updateJournal.addEventListener('click', function () {
    if (confirm('اطلاعات قبلی در مورد نشریه: ' +
        $("#editedName").val() +
        ' پس از تایید شما دیگر قابل استفاده نمی باشد. آیا تایید می کنید؟')) {
        $.ajax({
            url: "build/php/inc/EditJournal.php",
            type: "POST",
            data: {
                //Mag_Info
                editedName: $("#editedName").val(),
                postID: $("#postID").val(),
                editedScienceRank: $("#editedScienceRank").val(),
                editedScientificGroup: $("#editedScientificGroup").val(),
                editedInternationalPosition: $("#editedInternationalPosition").val(),
                editedMagType: $("#editedMagType").val(),
                editedPublicationPeriod: $("#editedPublicationPeriod").val(),
                editedISSN: $("#editedISSN").val(),
                editedMagState: $("#editedMagState").val(),
                editedMagCity: $("#editedMagCity").val(),
                editedMagAddress: $("#editedMagAddress").val(),
                editedMagPhone: $("#editedMagPhone").val(),
                editedMagFax: $("#editedMagFax").val(),
                editedMagEmail: $("#editedMagEmail").val(),
                editedWebsite: $("#editedWebsite").val(),
                editedConcessionaireType: $("#editedConcessionaireType").val(),
                editedConcessionaire: $("#editedConcessionaire").val(),

                //responsible_manager_owner
                editedResponsibleManagerOwnerSubject: $("#editedResponsibleManagerOwnerSubject").val(),
                editedResponsibleManagerOwnerName: $("#editedResponsibleManagerOwnerName").val(),
                editedResponsibleManagerOwnerFamily: $("#editedResponsibleManagerOwnerFamily").val(),
                editedResponsibleManagerOwnerDegree: $("#editedResponsibleManagerOwnerDegree").val(),
                editedResponsibleManagerOwnerPhone: $("#editedResponsibleManagerOwnerPhone").val(),
                editedResponsibleManagerOwnerMobile: $("#editedResponsibleManagerOwnerMobile").val(),
                editedResponsibleManagerOwnerAddress: $("#editedResponsibleManagerOwnerAddress").val(),

                //responsible_manager_owner
                editedChiefEditorSubject: $("#editedChiefEditorSubject").val(),
                editedChiefEditorName: $("#editedChiefEditorName").val(),
                editedChiefEditorFamily: $("#editedChiefEditorFamily").val(),
                editedChiefEditorDegree: $("#editedChiefEditorDegree").val(),
                editedChiefEditorPhone: $("#editedChiefEditorPhone").val(),
                editedChiefEditorMobile: $("#editedChiefEditorMobile").val(),
                editedChiefEditorAddress: $("#editedChiefEditorAddress").val(),

                //administration_manager
                editedAdministrationManagerSubject: $("#editedAdministrationManagerSubject").val(),
                editedAdministrationManagerName: $("#editedAdministrationManagerName").val(),
                editedAdministrationManagerFamily: $("#editedAdministrationManagerFamily").val(),
                editedAdministrationManagerDegree: $("#editedAdministrationManagerDegree").val(),
                editedAdministrationManagerPhone: $("#editedAdministrationManagerPhone").val(),
                editedAdministrationManagerMobile: $("#editedAdministrationManagerMobile").val(),
                editedAdministrationManagerAddress: $("#editedAdministrationManagerAddress").val(),
            },
            success: function (response) {
                console.log(response);
                // کد مربوط به پردازش پاسخ از سمت سرور را اینجا بنویسید
            }
        });
    }
});
