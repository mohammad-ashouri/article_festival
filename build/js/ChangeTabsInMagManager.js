function ChangeTabs(TabID) {
    var Tab1=document.getElementById('tab1');
    var Tab2=document.getElementById('tab2');
    var Tab3=document.getElementById('tab3');
    var TabActive=document.getElementById(TabID);
    var tab_1=document.getElementById('tab_1');
    var tab_2=document.getElementById('tab_2');
    var tab_3=document.getElementById('tab_3');
    Tab1.style.color='#6c757d';
    Tab1.style.backgroundColor='white';
    Tab2.style.color='#6c757d';
    Tab2.style.backgroundColor='white';
    Tab3.style.color='#6c757d';
    Tab3.style.backgroundColor='white';
    Tab1.className='nav-link';
    Tab2.className='nav-link';
    Tab3.className='nav-link';
    TabActive.className='nav-link active';
    TabActive.style.backgroundColor= '#007bff';
    TabActive.style.color= 'white';
    if (TabID=='tab1'){
        tab_1.className="tab-pane active";
        tab_2.className="tab-pane";
        tab_3.className="tab-pane";
    }
    else if (TabID=='tab2'){
        tab_1.className="tab-pane";
        tab_3.className="tab-pane";
        tab_2.className="tab-pane active";
    }
    else if (TabID=='tab3'){
        tab_1.className="tab-pane";
        tab_2.className="tab-pane";
        tab_3.className="tab-pane active";
    }

}
