//= require timeline/jquery.magnific-popup.min
//= require timeline/jquery.isotope
//= require timeline/jquery.dpSocialTimeline

$('#timeline').dpSocialTimeline({
  feeds: {
    facebook_page: {data: 'http://radimed.ca/facebook_auth/facebook_page.php?page_id=107986232604267'}
  },
  columnsItemWidth: 460,
  itemWidth: 460,
  showSocialIcons: false,
  showLayout: false,
  showFilter: false,
  share: false,
});