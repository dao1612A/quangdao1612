USE [master]
GO

/****** Object:  Database [doantotnghiep_laravel_doctor]    Script Date: 5/26/2022 8:14:44 PM ******/
CREATE DATABASE [doantotnghiep_laravel_doctor]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'doantotnghiep_laravel_doctor', FILENAME = N'c:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\doantotnghiep_laravel_doctor.mdf' , SIZE = 3072KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'doantotnghiep_laravel_doctor_log', FILENAME = N'c:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\doantotnghiep_laravel_doctor_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET COMPATIBILITY_LEVEL = 110
GO

IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [doantotnghiep_laravel_doctor].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET ANSI_NULL_DEFAULT OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET ANSI_NULLS OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET ANSI_PADDING OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET ANSI_WARNINGS OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET ARITHABORT OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET AUTO_CLOSE OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET AUTO_CREATE_STATISTICS ON 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET AUTO_SHRINK OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET AUTO_UPDATE_STATISTICS ON 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET CURSOR_DEFAULT  GLOBAL 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET CONCAT_NULL_YIELDS_NULL OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET NUMERIC_ROUNDABORT OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET QUOTED_IDENTIFIER OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET RECURSIVE_TRIGGERS OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET  DISABLE_BROKER 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET TRUSTWORTHY OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET PARAMETERIZATION SIMPLE 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET READ_COMMITTED_SNAPSHOT OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET HONOR_BROKER_PRIORITY OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET RECOVERY SIMPLE 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET  MULTI_USER 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET PAGE_VERIFY CHECKSUM  
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET DB_CHAINING OFF 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO

ALTER DATABASE [doantotnghiep_laravel_doctor] SET  READ_WRITE 
GO

