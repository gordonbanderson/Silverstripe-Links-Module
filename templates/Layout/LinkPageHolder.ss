<div class="typography">
	<% if Level(2) %>
	  	<% include BreadCrumbs %>
	<% end_if %>
	<h1>$Title</h1>
	 $Content
 
  <ul id="staffList">
    <% control Children %>
      <li>
        <a href="$URL">$Title</a><br/>$Description
      </li>
    <% end_control %>
  </ul>

</div>
