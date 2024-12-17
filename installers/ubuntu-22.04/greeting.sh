#!/bin/bash

CURRENT_IP=$(hostname -I | awk '{print $1}')

echo " \
  _______   _       _   _________  _______   _________   ___     _   _______   _
 |_______| | |     | | | |_______| | |   || | |-----| | | \ \   | | | |_____| | |
 | |       | |_____| | | |_______  |_|___|| | |_____| | | |\ \  | | | |_____  | |
 | |       | |_____| | | |_______| | |      | |_____| | | | \ \ | | | |_____| | |
 |_|_____  | |     | | | |_______  | |      | |     | | | |  \ \| | | |_____  | |______
 |_______| |_|     |_| |_|_______| |_|      |_|     |_| |_|   \_\_| |_|_____| |_|______|
 WELCOME TO CHE PANEL!
 BY: ATSiCorporation IN CORPORATION WITH ALDINARA DIGITECH INNOVATION
 OS: Ubuntu 22.04
 You can login at: https://$CURRENT_IP:8443
"

# File can be saved at: /etc/profile.d/greeting.sh
