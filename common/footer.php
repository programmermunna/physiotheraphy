<footer class="main_footer">
        <div class="footer_container" style="max-width:1140px;">
          <div class="footer_left">
          <?php echo $website['f_text'];?>
          </div>
          <ul class="footer_right">
            
            <li>
              <a href="tel:<?php echo $website['phone'];?>" style="color: #308CFE">
              <i class="fa-solid fa-square-phone"></i>
              </a>
            </li>
            <li>
              <a href="mailto:<?php echo $website['gmail'];?>" style="color: #308CFE">
              <i class="fa-solid fa-square-envelope"></i>
              </a>
            </li>
            <li>
              <a href="<?php echo $website['facebook'];?>" style="color: #308CFE">
              <i class="fa-brands fa-facebook"></i>
              </a>
            </li>

            <li>
              <a href="<?php echo $website['youtube'];?>" style="color: #308CFE">
              <i class="fa-brands fa-youtube"></i>
              </a>
            </li>
            
            <li>
              <a href="<?php echo $website['linkedin'];?>" style="color: #308CFE">
                <i class="fab fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </footer>



      <div class="chatbox"><?php echo $website['chatbox'];?></div>



      
  <script src="js/jquery.min.js"></script>
  <script src="lib/slicknav/slicknav.js"></script>
  <script src="js/main.js"></script>

</body>

</html>