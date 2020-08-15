        <?php include 'head.php'; ?>
    </head>
    <body>
        <div class="master-wrapper">
            <?php include 'header.php'; ?>
            <!--  ***** This is where you can put in a big hero image or another slider *****
            <div class="hero">
            </div>
            -->
            <div class="pagebody-no-hero"><!-- change class to pagebody-hero if you add a hero image or slideshow above -->
            <h1 class="pagetitle">About RAID Labs</h1>
            <div class="about-section group">
                <div class="image-column">
                    <img class="logo" src="img/UTALogo.jpg" width="147" height="183"/>
                <img src="img/labs1.png" width="249" height="127" align="left"></div>
                <div class="text-column">
                    <h2>Overview</h2>
                    <p class="about-intro">RAID Labs was established in 2011 under Dr. Erick Jones at the University of Texas at Arlington. Immediately after gaining the labs, setup  began and experiments were being run by undergraduates and PHD students alike. Current projects are involved in the areas of healthcare as well as factory lines, to name a few. The lab is currently also working on phone apps to help identify RFID tags.</p>
                    <h3>Some other focuses of the lab are:</h3>
                    <ul class="bulleted">
                        <li>Supply  Chain Logistics/Supply Chain (warehouse location) Analysis for city  government.</li>
                        <li>Engineering  Management-Productivity tool that measures the productivity of engineers and  knowledge workers based on behavioral characteristics.</li>
                        <li>RFID in the Mechanical Contracting Industry-Asset tracking development funded by the  Mechanical Contracting Educational Research Fund (MCERF).</li>
                        <li>RAID Labs  is made up of two high class facilities: the RFID Lab and the Auto ID Lab.</li>
                    </ul>
                </div>
            </div><!-- END About Section: intro -->

            <div class="about-section group">
              <div class="image-column">
                  <img src="img/rfid_facility.jpg" alt="RFID Facility"/>
                  <img src="img/healthcare_facility.jpg"/>               
                <img src="img/labs2.png" width="258" height="145"></div>
                <div class="text-column">
                    <h2>RFID Lab - Room 411/413 - Woolf Hall</h2>
                    <h3>Previous/Planned Equipment:</h3>
                    <ul class="bulleted">
                        <li>Military grade Fixed and Mobile Active RFID Systems (Lockheed Martin -Savi technologies, RF Code)</li>
                        <li>Industry grade high speed automated conveyor (Hytrol conveyor)</li>
                        <li>Industry recognized RFID edgeware, ERP and WMS systems, (Global Concepts)</li>
                        <li>Walmart/DOD mandated standard fixed and mobile passive RFID systems (Alien Technologies, Matrics)</li>
                        <li>Hospital tracking location systems (Ubisense Ultra Wide Band Real Time Location System)</li>
                        <li>Building modifications - automated locks and MavID</li>
                    </ul>
                    <h3>Facilities and Environment</h3>
                    <p>The healthcare research cell within the RFID laboratory contains Smart hospital beds, mannequins, and custom-built multi-frequency (433MHz, 915 MHz, and 2.4 GHz) RFID Smart Shelves for researching the applications of automatic identification technologies in the healthcare sector.</p>
                </div>
            </div><!-- END About Section: lab -->

            <div class="about-section group">
                <div class="image-column">
                    <img src="img/autoid_facility.jpg"/>              
                </div>
                <div class="text-column">
                    <h2>AUTO ID Lab - Room 309 - Engineering Lab Building</h2>
                    <p>The Auto ID Deployment Lab is used for testing of various industry operations using barcodes, 2D-barcodes, etching, maxi-code, NFC devices, and visual cameras. In addition, the AUTO ID lab houses large Auto ID panels, industry recognized RFID edgeware, ERP and WMS systems (Global Concepts), and is used to research building modifications such as automated locks tied to student ID cards (MavID).</p>
                </div>
            </div><!-- END About Section: auto id lab -->

            <div class="about-section group">
              <div class="image-column">
                <img src="img/how_rfid_3.jpg"></div>
              <div class="text-column">
                <h2>How RFID Works</h2>
                        <ol>
                        <li>The antenna of the interrogator (reader) emits radio signals
                            <ol>
                                <li>Transmitted EM field can be continuous</li>
                                <li>Antennas come in a variety of sizes</li>
                                <li>Can be built-in or external</li>
                                <li>Circular polarization of reader antenna allows any tag antenna orientation</li>
                          </ol>
                        </li>
                        <li>Transponders (tags) respond with their unique code
                            <ol>
                                <li>Tags contain a microchip / integrated circuit.</li>
                                <li>Tag antennas are made of a copper or aluminum coil.</li>
                                <li>Encapsulating material: glass or polymer.</li>
                            </ol>
                        </li>
                        <li>The reader receives and decodes the tag information and sends it to a computer via standard interfaces
                            <ol>
                                <li>Can be fixed or portable</li>
                                <li>Software can be used to filter data and monitor network</li>
                            </ol>
                        </li>
                    </ol>
              </div>
            </div><!-- END About Section: how RFID works -->

            <div class="about-section group">
              <div class="image-column">
                  <img src="img/rfid_wharehouse.jpg"/>
                  <img src="img/rfid_security.jpg">
                  <img src="img/smart_shelves.jpg">          
              </div>
                <div class="text-column">
                    <h2>Real World Applications</h2>
                    <h3>Logistics</h3>
                    <p>RFID offers logistical benefits by assisting in managing the flow of resources between the point of origin and the point of consumption while providing increased visibility and accountability.</p>
                    <h3>Security</h3>
                    <p>RFID technology can provide independant automated entry systems for government, law enforcement, contract, and healthcare personnel.</p>
                    <h3>Smart Shelves</h3>
                    <p>RFID can offer the ability to more closely monitor stocked products in a customer facing environment, and allows for notifying employees when supplies are running low or when theft is detected.</p>
                </div>
            </div><!-- END About Section: applications -->

            
          
                
            </div>
            <?php include 'footer.php'; ?>
        </div>
        <?php include 'script.php'; ?>
    </body>
</html>