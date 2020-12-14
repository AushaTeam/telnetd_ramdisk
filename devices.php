<?php

// https://github.com/libimobiledevice/libirecovery/blob/dfb682bc44e15f3db4cee270ad57a04bf61464a0/src/libirecovery.c#L119

//\{\s\"(.+?)\",\s+\"(.+?)\",\s+(.+?),\s+(.+?),\s+\"(.+)\"\s+\}

function irecv_lookup_device(int $cpid, int $bdid): ?array
{
  $irecv_devices = [
    /* iPhone */
    ["iPhone1,1", "m68ap", 0x00, 0x8900, "iPhone 2G"],
    ["iPhone1,2", "n82ap", 0x04, 0x8900, "iPhone 3G"],
    ["iPhone2,1", "n88ap", 0x00, 0x8920, "iPhone 3Gs"],
    ["iPhone3,1", "n90ap", 0x00, 0x8930, "iPhone 4 (GSM)"],
    ["iPhone3,2", "n90bap", 0x04, 0x8930, "iPhone 4 (GSM) R2 2012"],
    ["iPhone3,3", "n92ap", 0x06, 0x8930, "iPhone 4 (CDMA)"],
    ["iPhone4,1", "n94ap", 0x08, 0x8940, "iPhone 4s"],
    ["iPhone5,1", "n41ap", 0x00, 0x8950, "iPhone 5 (GSM)"],
    ["iPhone5,2", "n42ap", 0x02, 0x8950, "iPhone 5 (Global)"],
    ["iPhone5,3", "n48ap", 0x0a, 0x8950, "iPhone 5c (GSM)"],
    ["iPhone5,4", "n49ap", 0x0e, 0x8950, "iPhone 5c (Global)"],
    ["iPhone6,1", "n51ap", 0x00, 0x8960, "iPhone 5s (GSM)"],
    ["iPhone6,2", "n53ap", 0x02, 0x8960, "iPhone 5s (Global)"],
    ["iPhone7,1", "n56ap", 0x04, 0x7000, "iPhone 6 Plus"],
    ["iPhone7,2", "n61ap", 0x06, 0x7000, "iPhone 6"],
    ["iPhone8,1", "n71ap", 0x04, 0x8000, "iPhone 6s"],
    ["iPhone8,1", "n71map", 0x04, 0x8003, "iPhone 6s"],
    ["iPhone8,2", "n66ap", 0x06, 0x8000, "iPhone 6s Plus"],
    ["iPhone8,2", "n66map", 0x06, 0x8003, "iPhone 6s Plus"],
    ["iPhone8,4", "n69ap", 0x02, 0x8003, "iPhone SE"],
    ["iPhone8,4", "n69uap", 0x02, 0x8000, "iPhone SE"],
    ["iPhone9,1", "d10ap", 0x08, 0x8010, "iPhone 7 (Global)"],
    ["iPhone9,2", "d11ap", 0x0a, 0x8010, "iPhone 7 Plus (Global)"],
    ["iPhone9,3", "d101ap", 0x0c, 0x8010, "iPhone 7 (GSM)"],
    ["iPhone9,4", "d111ap", 0x0e, 0x8010, "iPhone 7 Plus (GSM)"],
    ["iPhone10,1", "d20ap", 0x02, 0x8015, "iPhone 8 (Global)"],
    ["iPhone10,2", "d21ap", 0x04, 0x8015, "iPhone 8 Plus (Global)"],
    ["iPhone10,3", "d22ap", 0x06, 0x8015, "iPhone X (Global)"],
    ["iPhone10,4", "d201ap", 0x0a, 0x8015, "iPhone 8 (GSM)"],
    ["iPhone10,5", "d211ap", 0x0c, 0x8015, "iPhone 8 Plus (GSM)"],
    ["iPhone10,6", "d221ap", 0x0e, 0x8015, "iPhone X (GSM)"],
    ["iPhone11,2", "d321ap", 0x0e, 0x8020, "iPhone XS"],
    ["iPhone11,4", "d331ap", 0x0a, 0x8020, "iPhone XS Max (China)"],
    ["iPhone11,6", "d331pap", 0x1a, 0x8020, "iPhone XS Max"],
    ["iPhone11,8", "n841ap", 0x0c, 0x8020, "iPhone XR"],
    ["iPhone12,1", "n104ap", 0x04, 0x8030, "iPhone 11"],
    ["iPhone12,3", "d421ap", 0x06, 0x8030, "iPhone 11 Pro"],
    ["iPhone12,5", "d431ap", 0x02, 0x8030, "iPhone 11 Pro Max"],
    ["iPhone12,8", "d79ap", 0x10, 0x8030, "iPhone SE (2020)"],
    ["iPhone13,1", "d52gap", 0x0A, 0x8101, "iPhone 12 mini"],
    ["iPhone13,2", "d53gap", 0x0C, 0x8101, "iPhone 12"],
    ["iPhone13,3", "d53pap", 0x0E, 0x8101, "iPhone 12 Pro"],
    ["iPhone13,4", "d54pap", 0x08, 0x8101, "iPhone 12 Pro Max"],
    /* iPod */
    ["iPod1,1", "n45ap", 0x02, 0x8900, "iPod Touch (1st gen)"],
    ["iPod2,1", "n72ap", 0x00, 0x8720, "iPod Touch (2nd gen)"],
    ["iPod3,1", "n18ap", 0x02, 0x8922, "iPod Touch (3rd gen)"],
    ["iPod4,1", "n81ap", 0x08, 0x8930, "iPod Touch (4th gen)"],
    ["iPod5,1", "n78ap", 0x00, 0x8942, "iPod Touch (5th gen)"],
    ["iPod7,1", "n102ap", 0x10, 0x7000, "iPod Touch (6th gen)"],
    ["iPod9,1", "n112ap", 0x16, 0x8010, "iPod Touch (7th gen)"],
    /* iPad */
    ["iPad1,1", "k48ap", 0x02, 0x8930, "iPad"],
    ["iPad2,1", "k93ap", 0x04, 0x8940, "iPad 2 (WiFi)"],
    ["iPad2,2", "k94ap", 0x06, 0x8940, "iPad 2 (GSM)"],
    ["iPad2,3", "k95ap", 0x02, 0x8940, "iPad 2 (CDMA)"],
    ["iPad2,4", "k93aap", 0x06, 0x8942, "iPad 2 (WiFi) R2 2012"],
    ["iPad2,5", "p105ap", 0x0a, 0x8942, "iPad Mini (WiFi)"],
    ["iPad2,6", "p106ap", 0x0c, 0x8942, "iPad Mini (GSM)"],
    ["iPad2,7", "p107ap", 0x0e, 0x8942, "iPad Mini (Global)"],
    ["iPad3,1", "j1ap", 0x00, 0x8945, "iPad 3 (WiFi)"],
    ["iPad3,2", "j2ap", 0x02, 0x8945, "iPad 3 (CDMA)"],
    ["iPad3,3", "j2aap", 0x04, 0x8945, "iPad 3 (GSM)"],
    ["iPad3,4", "p101ap", 0x00, 0x8955, "iPad 4 (WiFi)"],
    ["iPad3,5", "p102ap", 0x02, 0x8955, "iPad 4 (GSM)"],
    ["iPad3,6", "p103ap", 0x04, 0x8955, "iPad 4 (Global)"],
    ["iPad4,1", "j71ap", 0x10, 0x8960, "iPad Air (WiFi)"],
    ["iPad4,2", "j72ap", 0x12, 0x8960, "iPad Air (Cellular)"],
    ["iPad4,3", "j73ap", 0x14, 0x8960, "iPad Air (China)"],
    ["iPad4,4", "j85ap", 0x0a, 0x8960, "iPad Mini 2 (WiFi)"],
    ["iPad4,5", "j86ap", 0x0c, 0x8960, "iPad Mini 2 (Cellular)"],
    ["iPad4,6", "j87ap", 0x0e, 0x8960, "iPad Mini 2 (China)"],
    ["iPad4,7", "j85map", 0x32, 0x8960, "iPad Mini 3 (WiFi)"],
    ["iPad4,8", "j86map", 0x34, 0x8960, "iPad Mini 3 (Cellular)"],
    ["iPad4,9", "j87map", 0x36, 0x8960, "iPad Mini 3 (China)"],
    ["iPad5,1", "j96ap", 0x08, 0x7000, "iPad Mini 4 (WiFi)"],
    ["iPad5,2", "j97ap", 0x0A, 0x7000, "iPad Mini 4 (Cellular)"],
    ["iPad5,3", "j81ap", 0x06, 0x7001, "iPad Air 2 (WiFi)"],
    ["iPad5,4", "j82ap", 0x02, 0x7001, "iPad Air 2 (Cellular)"],
    ["iPad6,3", "j127ap", 0x08, 0x8001, "iPad Pro 9.7in (WiFi)"],
    ["iPad6,4", "j128ap", 0x0a, 0x8001, "iPad Pro 9.7in (Cellular)"],
    ["iPad6,7", "j98aap", 0x10, 0x8001, "iPad Pro 12.9in (WiFi)"],
    ["iPad6,8", "j99aap", 0x12, 0x8001, "iPad Pro 12.9in (Cellular)"],
    ["iPad6,11", "j71sap", 0x10, 0x8000, "iPad 5 (WiFi)"],
    ["iPad6,11", "j71tap", 0x10, 0x8003, "iPad 5 (WiFi)"],
    ["iPad6,12", "j72sap", 0x12, 0x8000, "iPad 5 (Cellular)"],
    ["iPad6,12", "j72tap", 0x12, 0x8003, "iPad 5 (Cellular)"],
    ["iPad7,1", "j120ap", 0x0C, 0x8011, "iPad Pro 2 12.9in (WiFi)"],
    ["iPad7,2", "j121ap", 0x0E, 0x8011, "iPad Pro 2 12.9in (Cellular)"],
    ["iPad7,3", "j207ap", 0x04, 0x8011, "iPad Pro 10.5in (WiFi)"],
    ["iPad7,4", "j208ap", 0x06, 0x8011, "iPad Pro 10.5in (Cellular)"],
    ["iPad7,5", "j71bap", 0x18, 0x8010, "iPad 6 (WiFi)"],
    ["iPad7,6", "j72bap", 0x1A, 0x8010, "iPad 6 (Cellular)"],
    ["iPad7,11", "j171ap", 0x1C, 0x8010, "iPad 7 (WiFi)"],
    ["iPad7,12", "j172ap", 0x1E, 0x8010, "iPad 7 (Cellular)"],
    ["iPad8,1", "j317ap", 0x0C, 0x8027, "iPad Pro 3 11in (WiFi)"],
    ["iPad8,2", "j317xap", 0x1C, 0x8027, "iPad Pro 3 11in (WiFi, 1TB)"],
    ["iPad8,3", "j318ap", 0x0E, 0x8027, "iPad Pro 3 11in (Cellular)"],
    ["iPad8,4", "j318xap", 0x1E, 0x8027, "iPad Pro 3 11in (Cellular, 1TB)"],
    ["iPad8,5", "j320ap", 0x08, 0x8027, "iPad Pro 3 12.9in (WiFi)"],
    ["iPad8,6", "j320xap", 0x18, 0x8027, "iPad Pro 3 12.9in (WiFi, 1TB)"],
    ["iPad8,7", "j321ap", 0x0A, 0x8027, "iPad Pro 3 12.9in (Cellular)"],
    ["iPad8,8", "j321xap", 0x1A, 0x8027, "iPad Pro 3 12.9in (Cellular, 1TB)"],
    ["iPad8,9", "j417ap", 0x3C, 0x8027, "iPad Pro 4 11in (WiFi)"],
    ["iPad8,10", "j418ap", 0x3E, 0x8027, "iPad Pro 4 11in (Cellular)"],
    ["iPad8,11", "j420ap", 0x38, 0x8027, "iPad Pro 4 12.9in (WiFi)"],
    ["iPad8,12", "j421ap", 0x3A, 0x8027, "iPad Pro 4 12.9in (Cellular)"],
    ["iPad11,1", "j210ap", 0x14, 0x8020, "iPad Mini 5 (WiFi)"],
    ["iPad11,2", "j211ap", 0x16, 0x8020, "iPad Mini 5 (Cellular)"],
    ["iPad11,3", "j217ap", 0x1C, 0x8020, "iPad Air 3 (WiFi)"],
    ["iPad11,4", "j218ap", 0x1E, 0x8020, "iPad Air 3 (Celluar)"],
    ["iPad11,6", "j171aap", 0x24, 0x8020, "iPad 8 (WiFi)"],
    ["iPad11,7", "j172aap", 0x26, 0x8020, "iPad 8 (Celluar)"],
    ["iPad13,1", "j307ap", 0x04, 0x8101, "iPad Air 4 (WiFi)"],
    ["iPad13,2", "j308ap", 0x06, 0x8101, "iPad Air 4 (Celluar)"],
    /* Apple TV */
    ["AppleTV2,1", "k66ap", 0x10, 0x8930, "Apple TV 2"],
    ["AppleTV3,1", "j33ap", 0x08, 0x8942, "Apple TV 3"],
    ["AppleTV3,2", "j33iap", 0x00, 0x8947, "Apple TV 3 (2013)"],
    ["AppleTV5,3", "j42dap", 0x34, 0x7000, "Apple TV 4"],
    ["AppleTV6,2", "j105aap", 0x02, 0x8011, "Apple TV 4K"],
    /* Apple Watch */
    ["Watch1,1", "n27aap", 0x02, 0x7002, "Apple Watch 38mm (1st gen)"],
    ["Watch1,2", "n28aap", 0x04, 0x7002, "Apple Watch 42mm (1st gen)"],
    ["Watch2,6", "n27dap", 0x02, 0x8002, "Apple Watch Series 1 (38mm)"],
    ["Watch2,7", "n28dap", 0x04, 0x8002, "Apple Watch Series 1 (42mm)"],
    ["Watch2,3", "n74ap", 0x0C, 0x8002, "Apple Watch Series 2 (38mm)"],
    ["Watch2,4", "n75ap", 0x0E, 0x8002, "Apple Watch Series 2 (42mm)"],
    ["Watch3,1", "n111sap", 0x1C, 0x8004, "Apple Watch Series 3 (38mm Cellular)"],
    ["Watch3,2", "n111bap", 0x1E, 0x8004, "Apple Watch Series 3 (42mm Cellular)"],
    ["Watch3,3", "n121sap", 0x18, 0x8004, "Apple Watch Series 3 (38mm)"],
    ["Watch3,4", "n121bap", 0x1A, 0x8004, "Apple Watch Series 3 (42mm)"],
    ["Watch4,1", "n131sap", 0x08, 0x8006, "Apple Watch Series 4 (40mm)"],
    ["Watch4,2", "n131bap", 0x0A, 0x8006, "Apple Watch Series 4 (44mm)"],
    ["Watch4,3", "n141sap", 0x0C, 0x8006, "Apple Watch Series 4 (40mm Cellular)"],
    ["Watch4,4", "n141bap", 0x0E, 0x8006, "Apple Watch Series 4 (44mm Cellular)"],
    ["Watch5,1", "n144sap", 0x10, 0x8006, "Apple Watch Series 5 (40mm)"],
    ["Watch5,2", "n144bap", 0x12, 0x8006, "Apple Watch Series 5 (44mm)"],
    ["Watch5,3", "n146sap", 0x14, 0x8006, "Apple Watch Series 5 (40mm Cellular)"],
    ["Watch5,4", "n146bap", 0x16, 0x8006, "Apple Watch Series 5 (44mm Cellular)"],
    ["Watch5,9", "n140sap", 0x28, 0x8006, "Apple Watch SE (40mm)"],
    ["Watch5,10", "n140bap", 0x2A, 0x8006, "Apple Watch SE (44mm)"],
    ["Watch5,11", "n142sap", 0x2C, 0x8006, "Apple Watch SE (40mm Cellular)"],
    ["Watch5,12", "n142bap", 0x2E, 0x8006, "Apple Watch SE (44mm Cellular)"],
    ["Watch6,1", "n157sap", 0x08, 0x8301, "Apple Watch Series 6 (40mm)"],
    ["Watch6,2", "n157bap", 0x0A, 0x8301, "Apple Watch Series 6 (44mm)"],
    ["Watch6,3", "n158sap", 0x0C, 0x8301, "Apple Watch Series 6 (40mm Cellular)"],
    ["Watch6,4", "n158bap", 0x0E, 0x8301, "Apple Watch Series 6 (44mm Cellular)"],
    /* Apple T2 Coprocessor */
    ["iBridge2,1", "j137ap", 0x0A, 0x8012, "Apple T2 iMacPro1,1 (j137)"],
    ["iBridge2,3", "j680ap", 0x0B, 0x8012, "Apple T2 MacBookPro15,1 (j680)"],
    ["iBridge2,4", "j132ap", 0x0C, 0x8012, "Apple T2 MacBookPro15,2 (j132)"],
    ["iBridge2,5", "j174ap", 0x0E, 0x8012, "Apple T2 Macmini8,1 (j174)"],
    ["iBridge2,6", "j160ap", 0x0F, 0x8012, "Apple T2 MacPro7,1 (j160)"],
    ["iBridge2,7", "j780ap", 0x07, 0x8012, "Apple T2 MacBookPro15,3 (j780)"],
    ["iBridge2,8", "j140kap", 0x17, 0x8012, "Apple T2 MacBookAir8,1 (j140k)"],
    ["iBridge2,10", "j213ap", 0x18, 0x8012, "Apple T2 MacBookPro15,4 (j213)"],
    ["iBridge2,12", "j140aap", 0x37, 0x8012, "Apple T2 MacBookAir8,2 (j140a)"],
    ["iBridge2,14", "j152f", 0x3A, 0x8012, "Apple T2 MacBookPro16,1 (j152f)"],
  ];

  foreach($irecv_devices as $irecv_device)
  {
    if($irecv_device[3] == $cpid && $irecv_device[2] == $bdid)
    {
      return $irecv_device;
    }
  }
  return null;

}

 ?>
