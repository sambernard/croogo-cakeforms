<?php
Croogo::hookRoutes('Cforms');
Croogo::hookComponent('Nodes', 'Cforms.Cforms');
Croogo::hookHelper('Nodes', 'Cforms.CformCss');
Croogo::hookAdminMenu('Cforms');
?>