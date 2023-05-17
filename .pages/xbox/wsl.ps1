#*******************************************************
#      PowerShell Script to Install WSL with Options
#*******************************************************



function Show-Menu {
    Clear-Host
    Write-Host "##########################################"
    Write-Host "############  WSL Installation ###########"
    Write-Host "##########################################"
    Write-Host "##########################################"
    Write-Host "Choose the Linux distribution:"
    Write-Host "1. Ubuntu"
    Write-Host "2. Kali Linux"
    Write-Host ""
    $choice = Read-Host "Enter your choice (1 or 2):"
    Process-Choice $choice
}

function Process-Choice($choice) {
    if ($choice -eq "1") {
        Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux
        wsl --set-default-version 2
        wsl --install -d Ubuntu
    }
    elseif ($choice -eq "2") {
        Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux
        wsl --set-default-version 2
        wsl --install -d KaliLinux
    }
    else {
        Write-Host "Invalid choice. Please try again."
        Start-Sleep -Seconds 3
        Show-Menu
    }
}

function Set-AutoStart {
    $taskName = "WSLStartup"
    $taskPath = "Microsoft\Windows\WSL"
    $taskTrigger = New-ScheduledTaskTrigger -AtStartup
    $taskAction = New-ScheduledTaskAction -Execute "wsl.exe" -Argument "--distribution Ubuntu"

    Register-ScheduledTask -TaskName $taskName -TaskPath $taskPath -Trigger $taskTrigger -Action $taskAction
    Set-ScheduledTask -TaskName $taskName -Settings $taskSettings -Force
}

Write-Host "##############################################"
Write-Host "#    WSL Installation Script for Lazy Asses    #"
Write-Host "##############################################"
Write-Host ""

# Function to display menu and get user choice
Function Show-Menu {
    Param (
        [string]$title = "WSL Installation",
        [string]$prompt = "Please select an option:"
    )
    Clear-Host
    Write-Host "================ $title ================"
    Write-Host ""
    Write-Host "1. Install WSL with WSL 2"
    Write-Host "2. Install WSL with WSL 1"
    Write-Host "3. Exit"
    Write-Host ""
    $choice = Read-Host -Prompt $prompt
    return $choice
}

# Check if running as administrator
if (-not ([Security.Principal.WindowsPrincipal][Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Host "You need to run this script as an administrator."
    exit 1
}

# Main script logic
$choice = Show-Menu
switch ($choice) {
    1 {
        Write-Host ""
        Write-Host "Starting installation of WSL with WSL 2..."
        Write-Host ""

        # Install WSL 2
        Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux -NoRestart
        Enable-WindowsOptionalFeature -Online -FeatureName VirtualMachinePlatform -NoRestart

        # Download and install WSL 2 Linux Kernel Update Package
        $kernelPackageUri = "https://aka.ms/wsl2kernel"
        $kernelPackagePath = "$env:TEMP\wsl2kernel.msi"
        (New-Object System.Net.WebClient).DownloadFile($kernelPackageUri, $kernelPackagePath)
        Start-Process -Wait -FilePath msiexec -ArgumentList "/i `"$kernelPackagePath`" /qn" -NoNewWindow

        # Set default WSL version to 2
        wsl --set-default-version 2

        # Prompt to enable auto-start on boot
        $autoStartChoice = Read-Host -Prompt "Do you want to enable auto-start on boot? (Y/N)"
        if ($autoStartChoice.ToUpper() -eq "Y") {
            wsl --set-autostart "Ubuntu" enable
        }

        Write-Host ""
        Write-Host "WSL installation with WSL 2 is complete."
        Write-Host ""
    }
    2 {
        Write-Host ""
        Write-Host "Starting installation of WSL with WSL 1..."
        Write-Host ""

        # Install WSL 1
        Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux -NoRestart

        # Prompt to enable auto-start on boot
        $autoStartChoice = Read-Host -Prompt "Do you want to enable auto-start on boot? (Y/N)"
        if ($autoStartChoice.ToUpper() -eq "Y") {
            wsl --set-autostart "Ubuntu" enable
        }

        Write-Host ""
        Write-Host "WSL installation with WSL 1 is complete."
        Write-Host ""
    }
    3 {
        Write-Host ""
        Write-Host "You're too lazy to install WSL? Fine, get lost."
        Write-Host ""
    }
    default {
        Write-Host ""
        Write-Host "Invalid choice. Please select a valid option."
Write-Host ""
Start-Sleep -Seconds 3
Show-Menu
}
}

Write-Host ""
Write-Host "Press any key to exit..."
$null = $host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")

Write-Host ""
Write-Host "===================="
Write-Host "  WSL Installation"
Write-Host "===================="
Write-Host ""
Write-Host "This script will install Windows Subsystem for Linux (WSL) and a Linux distribution of your choice."
Write-Host "Please make sure to run this script as an administrator."
Write-Host ""

Show-Menu

$autoStart = Read-Host "Do you want WSL to start automatically on boot? (Y/N)"
if ($autoStart.ToUpper() -eq "Y") {
    Set-AutoStart
    Write-Host "WSL will now start automatically on boot."
}
else {
    Write-Host "WSL will not start automatically on boot."
}

$rebootChoice = Read-Host "Do you want to reboot now? (Y/N)"
if ($rebootChoice.ToUpper() -eq "Y") {
    Write-Host "Rebooting in 2 minutes..."
    Start-Sleep -Seconds 120
    Restart-Computer -Force
}

Write-Host ""
Write-Host "Press any key to exit..."
$null = $host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
