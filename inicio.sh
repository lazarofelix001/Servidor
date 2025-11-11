#!/bin/bash

while true; do
    clear
    echo "=============================="
    echo "       Menú de XAMPP/Apache"
    echo "=============================="
    echo "1) Reiniciar Apache2 y XAMPP"
    echo "2) Detener solo XAMPP"
    echo "3) Salir"
    echo "=============================="
    read -p "Elige una opción [1-3]: " opcion

    case $opcion in
        1)
            echo "Deteniendo Apache2..."
            sudo systemctl stop apache2
            echo "Deteniendo XAMPP..."
            sudo /opt/lampp/lampp stop
            echo "Iniciando XAMPP..."
            sudo /opt/lampp/lampp start
            read -p "Presiona Enter para continuar..."
            ;;
        2)
            echo "Deteniendo XAMPP..."
            sudo /opt/lampp/lampp stop
            read -p "Presiona Enter para continuar..."
            ;;
        3)
            echo "Saliendo..."
            exit 0
            ;;
        *)
            echo "Opción inválida, intenta de nuevo."
            read -p "Presiona Enter para continuar..."
            ;;
    esac
done

