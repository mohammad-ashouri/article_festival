function getInfo(id) {
    $.ajax({
        url: "build/ajax/GetMagAllInfo.php",
        type: "GET",
        data: {
            id: id,
            name: ''
        },
        success: function (response) {
            //Mag_Info
            $("#editedName").val(response.name);
            $("#postID").val(response.id);
            $("#editedScienceRank").val(response.science_rank).trigger('change');
            $("#editedScientificGroup").val(response.scientific_group.split('/')).trigger('change');
            $("#editedInternationalPosition").val(response.international_position.split('/')).trigger('change');
            $("#editedMagType").val(response.mag_type).trigger('change');
            $("#editedPublicationPeriod").val(response.publication_period).trigger('change');
            $("#editedISSN").val(response.ISSN);
            $("#editedMagState").val(response.mag_state);
            $("#editedMagCity").val(response.mag_city);
            $("#editedMagAddress").val(response.mag_address);
            $("#editedMagPhone").val(response.mag_phone);
            $("#editedMagFax").val(response.mag_fax);
            $("#editedMagEmail").val(response.mag_email);
            $("#editedWebsite").val(response.mag_website);
            $("#editedConcessionaireType").val(response.concessionaire_type).trigger('change');
            $("#editedConcessionaire").val(response.concessionaire).trigger('change');

            //responsible_manager_owner
            $("#editedResponsibleManagerOwnerSubject").val(response.responsible_manager_owner_subject).trigger('change');
            $("#editedResponsibleManagerOwnerName").val(response.responsible_manager_owner_name);
            $("#editedResponsibleManagerOwnerFamily").val(response.responsible_manager_owner_family);
            $("#editedResponsibleManagerOwnerDegree").val(response.responsible_manager_owner_degree).trigger('change');
            $("#editedResponsibleManagerOwnerPhone").val(response.responsible_manager_owner_phone);
            $("#editedResponsibleManagerOwnerMobile").val(response.responsible_manager_owner_mobile);
            $("#editedResponsibleManagerOwnerAddress").val(response.responsible_manager_owner_address);

            //responsible_manager_owner
            $("#editedChiefEditorSubject").val(response.chief_editor_subject).trigger('change');
            $("#editedChiefEditorName").val(response.chief_editor_name);
            $("#editedChiefEditorFamily").val(response.chief_editor_family);
            $("#editedChiefEditorDegree").val(response.chief_editor_degree).trigger('change');
            $("#editedChiefEditorPhone").val(response.chief_editor_phone);
            $("#editedChiefEditorMobile").val(response.chief_editor_mobile);
            $("#editedChiefEditorAddress").val(response.chief_editor_address);

            //administration_manager
            $("#editedAdministrationManagerSubject").val(response.administration_manager_subject).trigger('change');
            $("#editedAdministrationManagerName").val(response.administration_manager_name);
            $("#editedAdministrationManagerFamily").val(response.administration_manager_family);
            $("#editedAdministrationManagerDegree").val(response.administration_manager_degree).trigger('change');
            $("#editedAdministrationManagerPhone").val(response.administration_manager_phone);
            $("#editedAdministrationManagerMobile").val(response.administration_manager_mobile);
            $("#editedAdministrationManagerAddress").val(response.administration_manager_address);
        }
    });
}
