<span class="txt">

<div id="lk">
  <h2>$Title</h2>
  $Content

  <ul class="linksListing">

 <% control AllChildren %>
      <li>
        <h2><a href="$URL"  title="External link to website $Title">$Title</a></h2>
        <div>$Description</div>
      </li>
    <% end_control %>

</ul>

</div><!-- end lk -->
</span><!--/txt-->