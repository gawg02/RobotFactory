<head>
    <link rel='stylesheet' type="text/css" href="/assets/css/about.css">
</head>

<span class='col-md-12' id='content'>
    <h1>About Team Elderberry!</h1>

    <p>This is a student project for COMP4711 at BCIT. There is no affiliation with us and any company, fictional or otherwise.</p>
   
    <div class = 'col-md-12'>
        {team}
        <div class='col-md-4'>
            <span  id="teammembers">
                <a href="/teammate/{id}"><img src="/assets/images/faces/{face}" title="{quote}"/></a>
            </span>
            <h3>{name}</h3>
        </div>
        {/team}
   </div>

</span>