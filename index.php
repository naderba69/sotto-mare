<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sotto Mare — San Francisco's Finest Seafood</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <style>
    :root {
      --navy: #0a1628;
      --deep-blue: #1a3a5c;
      --ocean: #2c6e9b;
      --seafoam: #5ba4cf;
      --light-blue: #a8d4f0;
      --pale-blue: #dceef8;
      --white: #ffffff;
      --cream: #f5f9fc;
      --gold: #c9a84c;
      --gold-light: #e8d49a;
      --text-dark: #1a1a2e;
      --text-muted: #6b7b8d;
      --shadow-sm: 0 2px 8px rgba(10, 22, 40, 0.08);
      --shadow-md: 0 8px 30px rgba(10, 22, 40, 0.12);
      --shadow-lg: 0 20px 60px rgba(10, 22, 40, 0.15);
      --shadow-xl: 0 30px 80px rgba(10, 22, 40, 0.2);
      --radius: 12px;
      --radius-lg: 20px;
      --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    html { scroll-behavior: smooth; font-size: 16px; }

    body {
      font-family: 'Inter', sans-serif;
      color: var(--text-dark);
      background: var(--white);
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* ===== PRELOADER ===== */
    .preloader {
      position: fixed;
      inset: 0;
      background: var(--navy);
      display: flex;
      align-items: center;
      justify-content: center;      z-index: 10000;
      transition: opacity 0.6s ease, visibility 0.6s ease;
    }
    .preloader.hidden { opacity: 0; visibility: hidden; pointer-events: none; }
    .preloader-content { text-align: center; }
    .preloader-logo {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      color: var(--white);
      letter-spacing: 3px;
      margin-bottom: 30px;
    }
    .preloader-bar {
      width: 200px;
      height: 2px;
      background: rgba(255,255,255,0.1);
      border-radius: 2px;
      overflow: hidden;
      margin: 0 auto;
    }
    .preloader-bar::after {
      content: '';
      display: block;
      width: 40%;
      height: 100%;
      background: var(--gold);
      border-radius: 2px;
      animation: preload 1.2s ease-in-out infinite;
    }
    @keyframes preload {
      0% { transform: translateX(-100%); }
      100% { transform: translateX(350%); }
    }

    /* ===== NAVIGATION ===== */
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      padding: 20px 0;
      transition: var(--transition);
    }
    .navbar.scrolled {
      background: rgba(255, 255, 255, 0.97);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      padding: 12px 0;
      box-shadow: 0 4px 30px rgba(0,0,0,0.08);    }
    .nav-container {
      max-width: 1300px;
      margin: 0 auto;
      padding: 0 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .nav-logo {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
    }
    .nav-logo-icon {
      width: 42px;
      height: 42px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .nav-logo-icon svg { width: 100%; height: 100%; }
    .nav-logo-text {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--white);
      letter-spacing: 1px;
      transition: var(--transition);
    }
    .navbar.scrolled .nav-logo-text { color: var(--navy); }
    .nav-links {
      display: flex;
      align-items: center;
      gap: 36px;
      list-style: none;
    }
    .nav-links a {
      text-decoration: none;
      font-size: 0.85rem;
      font-weight: 500;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.85);
      transition: var(--transition);
      position: relative;
    }
    .nav-links a::after {
      content: '';      position: absolute;
      bottom: -4px;
      left: 0;
      width: 0;
      height: 1.5px;
      background: var(--gold);
      transition: width 0.3s ease;
    }
    .nav-links a:hover::after { width: 100%; }
    .navbar.scrolled .nav-links a { color: var(--text-dark); }
    .nav-links a:hover { color: var(--white); }
    .navbar.scrolled .nav-links a:hover { color: var(--ocean); }
    .nav-reserve-btn {
      padding: 10px 28px;
      background: transparent;
      border: 1.5px solid rgba(255,255,255,0.5);
      color: var(--white);
      font-family: 'Inter', sans-serif;
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: var(--transition);
      border-radius: 4px;
      text-decoration: none;
    }
    .nav-reserve-btn:hover {
      background: var(--white);
      color: var(--navy);
    }
    .navbar.scrolled .nav-reserve-btn {
      border-color: var(--ocean);
      color: var(--ocean);
    }
    .navbar.scrolled .nav-reserve-btn:hover {
      background: var(--ocean);
      color: var(--white);
    }

    /* Hamburger */
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
      padding: 5px;
      z-index: 1001;
    }
    .hamburger span {      width: 24px;
      height: 2px;
      background: var(--white);
      transition: var(--transition);
      border-radius: 2px;
    }
    .navbar.scrolled .hamburger span { background: var(--navy); }
    .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

    /* Mobile Menu */
    .mobile-menu {
      display: none;
      position: fixed;
      inset: 0;
      background: var(--navy);
      z-index: 999;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 30px;
      opacity: 0;
      visibility: hidden;
      transition: var(--transition);
    }
    .mobile-menu.active { opacity: 1; visibility: visible; }
    .mobile-menu a {
      text-decoration: none;
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      color: var(--white);
      transition: var(--transition);
    }
    .mobile-menu a:hover { color: var(--gold); }

    /* ===== HERO ===== */
    .hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      background: var(--navy);
    }
    .hero-bg {
      position: absolute;
      inset: 0;
      background:        linear-gradient(135deg, rgba(10, 22, 40, 0.7) 0%, rgba(26, 58, 92, 0.5) 50%, rgba(10, 22, 40, 0.8) 100%),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 900"><defs><linearGradient id="g1" x1="0%25" y1="0%25" x2="100%25" y2="100%25"><stop offset="0%25" stop-color="%231a3a5c"/><stop offset="50%25" stop-color="%232c6e9b"/><stop offset="100%25" stop-color="%230a1628"/></linearGradient></defs><rect fill="url(%23g1)" width="1440" height="900"/></svg>');
      background-size: cover;
      background-position: center;
    }
    .hero-waves {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 120px;
      overflow: hidden;
    }
    .hero-waves svg { position: absolute; bottom: 0; width: 200%; height: 100%; }
    .hero-particles {
      position: absolute;
      inset: 0;
      overflow: hidden;
    }
    .particle {
      position: absolute;
      width: 3px;
      height: 3px;
      background: rgba(255,255,255,0.15);
      border-radius: 50%;
      animation: float-particle linear infinite;
    }
    @keyframes float-particle {
      0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(-10vh) rotate(720deg); opacity: 0; }
    }
    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 0 20px;
      max-width: 900px;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 8px 24px;
      background: rgba(201, 168, 76, 0.15);
      border: 1px solid rgba(201, 168, 76, 0.3);
      border-radius: 50px;
      margin-bottom: 30px;
      animation: fadeInDown 1s ease 0.3s both;    }
    .hero-badge span {
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--gold);
    }
    .hero-badge-dot {
      width: 6px;
      height: 6px;
      background: var(--gold);
      border-radius: 50%;
    }
    .hero-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(3rem, 7vw, 6rem);
      font-weight: 700;
      color: var(--white);
      line-height: 1.1;
      margin-bottom: 10px;
      animation: fadeInUp 1s ease 0.5s both;
    }
    .hero-title em {
      font-style: italic;
      color: var(--light-blue);
    }
    .hero-subtitle {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(1.1rem, 2vw, 1.5rem);
      color: rgba(255,255,255,0.7);
      font-weight: 400;
      font-style: italic;
      margin-bottom: 40px;
      letter-spacing: 1px;
      animation: fadeInUp 1s ease 0.7s both;
    }
    .hero-actions {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
      animation: fadeInUp 1s ease 0.9s both;
    }
    .btn-primary {
      padding: 16px 40px;
      background: var(--gold);
      color: var(--navy);
      border: none;      font-family: 'Inter', sans-serif;
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: var(--transition);
      border-radius: 4px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }
    .btn-primary:hover {
      background: var(--gold-light);
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(201, 168, 76, 0.3);
    }
    .btn-secondary {
      padding: 16px 40px;
      background: transparent;
      color: var(--white);
      border: 1.5px solid rgba(255,255,255,0.3);
      font-family: 'Inter', sans-serif;
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: var(--transition);
      border-radius: 4px;
      text-decoration: none;
    }
    .btn-secondary:hover {
      border-color: var(--white);
      background: rgba(255,255,255,0.1);
      transform: translateY(-2px);
    }
    .hero-scroll {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 2;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      animation: fadeInUp 1s ease 1.2s both;
    }    .hero-scroll span {
      font-size: 0.7rem;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.4);
    }
    .scroll-line {
      width: 1px;
      height: 40px;
      background: linear-gradient(to bottom, rgba(255,255,255,0.4), transparent);
      animation: scroll-pulse 2s ease infinite;
    }
    @keyframes scroll-pulse {
      0%, 100% { opacity: 0.4; transform: scaleY(1); }
      50% { opacity: 1; transform: scaleY(1.2); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ===== SECTION COMMON ===== */
    .section { padding: 120px 0; }
    .container {
      max-width: 1300px;
      margin: 0 auto;
      padding: 0 40px;
    }
    .section-header {
      text-align: center;
      margin-bottom: 70px;
    }
    .section-label {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 16px;
    }
    .section-label-line {
      width: 40px;
      height: 1px;
      background: var(--gold);
    }
    .section-label span {
      font-size: 0.75rem;      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--gold);
    }
    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 4vw, 3.2rem);
      font-weight: 700;
      color: var(--navy);
      line-height: 1.2;
      margin-bottom: 16px;
    }
    .section-title em { font-style: italic; color: var(--ocean); }
    .section-desc {
      font-size: 1.05rem;
      color: var(--text-muted);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.7;
    }

    /* ===== ABOUT ===== */
    .about { background: var(--cream); }
    .about-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
    }
    .about-image-wrapper {
      position: relative;
    }
    .about-image {
      width: 100%;
      aspect-ratio: 4/5;
      background: linear-gradient(135deg, var(--deep-blue), var(--ocean));
      border-radius: var(--radius-lg);
      overflow: hidden;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .about-image-content {
      text-align: center;
      color: var(--white);
      padding: 40px;
    }
    .about-image-content svg { width: 80px; height: 80px; margin-bottom: 20px; opacity: 0.8; }    .about-image-content h3 {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      margin-bottom: 10px;
    }
    .about-image-content p {
      font-size: 0.9rem;
      opacity: 0.7;
      font-style: italic;
    }
    .about-image-accent {
      position: absolute;
      top: -20px;
      right: -20px;
      width: 120px;
      height: 120px;
      border: 2px solid var(--gold);
      border-radius: var(--radius-lg);
      z-index: -1;
    }
    .about-experience {
      position: absolute;
      bottom: -20px;
      left: -20px;
      background: var(--gold);
      color: var(--navy);
      padding: 24px 30px;
      border-radius: var(--radius);
      text-align: center;
      box-shadow: var(--shadow-lg);
    }
    .about-experience .number {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      font-weight: 700;
      line-height: 1;
    }
    .about-experience .label {
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-top: 4px;
    }
    .about-text h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      color: var(--navy);
      margin-bottom: 20px;
      line-height: 1.3;    }
    .about-text p {
      color: var(--text-muted);
      line-height: 1.8;
      margin-bottom: 16px;
      font-size: 1rem;
    }
    .about-features {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-top: 30px;
    }
    .about-feature {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .about-feature-icon {
      width: 44px;
      height: 44px;
      background: var(--pale-blue);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .about-feature-icon svg { width: 20px; height: 20px; color: var(--ocean); }
    .about-feature span {
      font-size: 0.9rem;
      font-weight: 500;
      color: var(--navy);
    }

    /* ===== SPECIALTIES ===== */
    .specialties-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 30px;
    }
    .specialty-card {
      background: var(--white);
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      border: 1px solid rgba(0,0,0,0.04);
    }
    .specialty-card:hover {      transform: translateY(-8px);
      box-shadow: var(--shadow-lg);
    }
    .specialty-image {
      height: 220px;
      background: linear-gradient(135deg, var(--deep-blue), var(--ocean));
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }
    .specialty-image svg { width: 60px; height: 60px; color: rgba(255,255,255,0.6); }
    .specialty-tag {
      position: absolute;
      top: 16px;
      left: 16px;
      padding: 6px 14px;
      background: var(--gold);
      color: var(--navy);
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      border-radius: 4px;
    }
    .specialty-info { padding: 28px; }
    .specialty-info h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.4rem;
      color: var(--navy);
      margin-bottom: 10px;
    }
    .specialty-info p {
      color: var(--text-muted);
      font-size: 0.9rem;
      line-height: 1.6;
      margin-bottom: 16px;
    }
    .specialty-price {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      color: var(--ocean);
      font-weight: 600;
    }

    /* ===== MENU ===== */
    .menu { background: var(--cream); }
    .menu-tabs {
      display: flex;      align-items: center;
      justify-content: center;
      gap: 8px;
      margin-bottom: 50px;
      flex-wrap: wrap;
    }
    .menu-tab {
      padding: 12px 28px;
      background: transparent;
      border: 1.5px solid rgba(0,0,0,0.1);
      border-radius: 50px;
      font-family: 'Inter', sans-serif;
      font-size: 0.82rem;
      font-weight: 600;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--text-muted);
      cursor: pointer;
      transition: var(--transition);
    }
    .menu-tab:hover { border-color: var(--ocean); color: var(--ocean); }
    .menu-tab.active {
      background: var(--ocean);
      border-color: var(--ocean);
      color: var(--white);
    }
    .menu-content { display: none; }
    .menu-content.active { display: block; animation: fadeInUp 0.5s ease; }
    .menu-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
    }
    .menu-item {
      display: flex;
      gap: 20px;
      padding: 24px;
      background: var(--white);
      border-radius: var(--radius);
      transition: var(--transition);
      border: 1px solid rgba(0,0,0,0.04);
    }
    .menu-item:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }
    .menu-item-image {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, var(--pale-blue), var(--light-blue));      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .menu-item-image svg { width: 32px; height: 32px; color: var(--ocean); }
    .menu-item-info { flex: 1; }
    .menu-item-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 6px;
    }
    .menu-item-name {
      font-family: 'Playfair Display', serif;
      font-size: 1.15rem;
      color: var(--navy);
      font-weight: 600;
    }
    .menu-item-price {
      font-family: 'Playfair Display', serif;
      font-size: 1.15rem;
      color: var(--ocean);
      font-weight: 600;
      white-space: nowrap;
      margin-left: 12px;
    }
    .menu-item-desc {
      font-size: 0.88rem;
      color: var(--text-muted);
      line-height: 1.5;
    }
    .menu-item-tags {
      display: flex;
      gap: 6px;
      margin-top: 8px;
      flex-wrap: wrap;
    }
    .menu-item-tag {
      padding: 3px 10px;
      background: var(--pale-blue);
      color: var(--ocean);
      font-size: 0.68rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      border-radius: 3px;
    }
    .menu-item-tag.popular { background: rgba(201, 168, 76, 0.15); color: var(--gold); }    .menu-item-tag.spicy { background: rgba(220, 53, 69, 0.1); color: #dc3545; }
    .menu-item-tag.gf { background: rgba(40, 167, 69, 0.1); color: #28a745; }

    /* ===== RESERVATION ===== */
    .reservation {
      position: relative;
      overflow: hidden;
    }
    .reservation-bg {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, var(--navy) 0%, var(--deep-blue) 100%);
    }
    .reservation-pattern {
      position: absolute;
      inset: 0;
      background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.03) 1px, transparent 0);
      background-size: 40px 40px;
    }
    .reservation .container { position: relative; z-index: 2; }
    .reservation .section-title { color: var(--white); }
    .reservation .section-desc { color: rgba(255,255,255,0.6); }
    .reservation-grid {
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 60px;
      align-items: start;
    }
    .reservation-info { color: var(--white); }
    .reservation-info h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      margin-bottom: 16px;
    }
    .reservation-info p {
      color: rgba(255,255,255,0.6);
      line-height: 1.7;
      margin-bottom: 30px;
    }
    .reservation-details {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    .reservation-detail {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .reservation-detail-icon {      width: 50px;
      height: 50px;
      background: rgba(255,255,255,0.08);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .reservation-detail-icon svg { width: 22px; height: 22px; color: var(--gold); }
    .reservation-detail-text h4 {
      font-size: 0.95rem;
      font-weight: 600;
      margin-bottom: 2px;
    }
    .reservation-detail-text p {
      font-size: 0.85rem;
      color: rgba(255,255,255,0.5);
      margin: 0;
    }
    .reservation-form-wrapper {
      background: var(--white);
      border-radius: var(--radius-lg);
      padding: 44px;
      box-shadow: var(--shadow-xl);
    }
    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
    }
    .form-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }
    .form-group.full { grid-column: 1 / -1; }
    .form-group label {
      font-size: 0.78rem;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--text-dark);
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
      padding: 14px 16px;
      border: 1.5px solid rgba(0,0,0,0.1);      border-radius: 8px;
      font-family: 'Inter', sans-serif;
      font-size: 0.95rem;
      color: var(--text-dark);
      transition: var(--transition);
      background: var(--cream);
      outline: none;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      border-color: var(--ocean);
      background: var(--white);
      box-shadow: 0 0 0 3px rgba(44, 110, 155, 0.1);
    }
    .form-group textarea { resize: vertical; min-height: 100px; }
    .form-submit {
      width: 100%;
      padding: 16px;
      background: var(--ocean);
      color: var(--white);
      border: none;
      border-radius: 8px;
      font-family: 'Inter', sans-serif;
      font-size: 0.9rem;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: var(--transition);
      margin-top: 8px;
    }
    .form-submit:hover {
      background: var(--deep-blue);
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(44, 110, 155, 0.3);
    }
    .form-submit:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials { background: var(--white); }
    .testimonials-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 30px;
    }    .testimonial-card {
      padding: 36px;
      background: var(--cream);
      border-radius: var(--radius-lg);
      transition: var(--transition);
      border: 1px solid rgba(0,0,0,0.04);
    }
    .testimonial-card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-4px);
    }
    .testimonial-stars {
      display: flex;
      gap: 4px;
      margin-bottom: 16px;
    }
    .testimonial-stars svg { width: 16px; height: 16px; color: var(--gold); fill: var(--gold); }
    .testimonial-text {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.15rem;
      font-style: italic;
      color: var(--text-dark);
      line-height: 1.7;
      margin-bottom: 24px;
    }
    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .testimonial-avatar {
      width: 48px;
      height: 48px;
      background: linear-gradient(135deg, var(--ocean), var(--seafoam));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--white);
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      font-weight: 600;
    }
    .testimonial-name {
      font-weight: 600;
      font-size: 0.95rem;
      color: var(--navy);
    }
    .testimonial-role {
      font-size: 0.8rem;      color: var(--text-muted);
    }

    /* ===== GALLERY ===== */
    .gallery { background: var(--cream); padding: 100px 0; }
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: repeat(2, 200px);
      gap: 16px;
    }
    .gallery-item {
      border-radius: var(--radius);
      overflow: hidden;
      position: relative;
      cursor: pointer;
      background: linear-gradient(135deg, var(--deep-blue), var(--ocean));
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }
    .gallery-item:hover { transform: scale(1.02); }
    .gallery-item:hover .gallery-overlay { opacity: 1; }
    .gallery-item:nth-child(1) { grid-column: span 2; grid-row: span 2; }
    .gallery-item svg { width: 40px; height: 40px; color: rgba(255,255,255,0.4); }
    .gallery-overlay {
      position: absolute;
      inset: 0;
      background: rgba(10, 22, 40, 0.6);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: var(--transition);
    }
    .gallery-overlay span {
      color: var(--white);
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      font-style: italic;
    }

    /* ===== FOOTER ===== */
    .footer {
      background: var(--navy);
      color: var(--white);
      padding: 80px 0 0;
    }
    .footer-grid {      display: grid;
      grid-template-columns: 1.5fr 1fr 1fr 1fr;
      gap: 50px;
      padding-bottom: 60px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .footer-brand p {
      color: rgba(255,255,255,0.5);
      line-height: 1.7;
      margin: 16px 0 24px;
      font-size: 0.9rem;
    }
    .footer-social {
      display: flex;
      gap: 12px;
    }
    .footer-social a {
      width: 40px;
      height: 40px;
      background: rgba(255,255,255,0.06);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }
    .footer-social a:hover { background: var(--gold); }
    .footer-social a svg { width: 18px; height: 18px; color: var(--white); }
    .footer-col h4 {
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      margin-bottom: 20px;
      color: var(--white);
    }
    .footer-col ul { list-style: none; }
    .footer-col ul li { margin-bottom: 10px; }
    .footer-col ul li a {
      color: rgba(255,255,255,0.5);
      text-decoration: none;
      font-size: 0.9rem;
      transition: var(--transition);
    }
    .footer-col ul li a:hover { color: var(--gold); }
    .footer-bottom {
      padding: 24px 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 16px;    }
    .footer-bottom p {
      font-size: 0.82rem;
      color: rgba(255,255,255,0.35);
    }

    /* ===== TOAST ===== */
    .toast {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: var(--navy);
      color: var(--white);
      padding: 20px 30px;
      border-radius: var(--radius);
      box-shadow: var(--shadow-xl);
      z-index: 9999;
      display: flex;
      align-items: center;
      gap: 14px;
      transform: translateY(120%);
      opacity: 0;
      transition: var(--transition);
    }
    .toast.show { transform: translateY(0); opacity: 1; }
    .toast-icon {
      width: 40px;
      height: 40px;
      background: #28a745;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .toast-icon svg { width: 20px; height: 20px; color: white; }
    .toast-message h4 { font-size: 0.95rem; margin-bottom: 2px; }
    .toast-message p { font-size: 0.82rem; color: rgba(255,255,255,0.6); }

    /* ===== SCROLL ANIMATIONS ===== */
    .reveal {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
      .about-grid { grid-template-columns: 1fr; gap: 50px; }
      .specialties-grid { grid-template-columns: repeat(2, 1fr); }
      .reservation-grid { grid-template-columns: 1fr; }
      .testimonials-grid { grid-template-columns: repeat(2, 1fr); }
      .footer-grid { grid-template-columns: repeat(2, 1fr); }
      .gallery-grid { grid-template-columns: repeat(3, 1fr); grid-template-rows: repeat(2, 180px); }
      .gallery-item:nth-child(1) { grid-column: span 1; grid-row: span 1; }
    }

    @media (max-width: 768px) {
      .nav-links { display: none; }
      .nav-reserve-btn { display: none; }
      .hamburger { display: flex; }
      .mobile-menu { display: flex; }
      .container { padding: 0 20px; }
      .section { padding: 80px 0; }
      .section-header { margin-bottom: 40px; }
      .specialties-grid { grid-template-columns: 1fr; }
      .menu-grid { grid-template-columns: 1fr; }
      .menu-item { flex-direction: column; }
      .menu-item-image { width: 100%; height: 120px; }
      .form-row { grid-template-columns: 1fr; }
      .reservation-form-wrapper { padding: 28px; }
      .testimonials-grid { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr; gap: 30px; }
      .gallery-grid { grid-template-columns: repeat(2, 1fr); grid-template-rows: repeat(3, 150px); }
      .hero-title { font-size: 2.8rem; }
      .about-features { grid-template-columns: 1fr; }
    }

    @media (max-width: 480px) {
      .hero-title { font-size: 2.2rem; }
      .hero-actions { flex-direction: column; width: 100%; }
      .btn-primary, .btn-secondary { width: 100%; justify-content: center; text-align: center; }
      .menu-tabs { gap: 6px; }
      .menu-tab { padding: 10px 18px; font-size: 0.72rem; }
    }
  </style>
</head>
<body>

  <!-- Preloader -->
  <div class="preloader" id="preloader">
    <div class="preloader-content">
      <div class="preloader-logo">SOTTO MARE</div>
      <div class="preloader-bar"></div>
    </div>
  </div>
  <!-- Navigation -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="#" class="nav-logo">
        <div class="nav-logo-icon">
          <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25 4C15 4 8 12 8 20c0 6 4 11 9 13v8a2 2 0 004 0V34h8v7a2 2 0 004 0v-8c5-2 9-7 9-13 0-8-7-16-17-16z" fill="currentColor" opacity="0.9"/>
            <path d="M18 18c0-4 3-7 7-7s7 3 7 7" stroke="white" stroke-width="1.5" fill="none" opacity="0.6"/>
            <circle cx="20" cy="17" r="1.5" fill="white" opacity="0.8"/>
            <circle cx="30" cy="17" r="1.5" fill="white" opacity="0.8"/>
          </svg>
        </div>
        <span class="nav-logo-text">Sotto Mare</span>
      </a>
      <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#specialties">Specialties</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#testimonials">Reviews</a></li>
      </ul>
      <a href="#reservation" class="nav-reserve-btn">Reserve</a>
      <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div class="mobile-menu" id="mobileMenu">
    <a href="#about" onclick="closeMobile()">About</a>
    <a href="#specialties" onclick="closeMobile()">Specialties</a>
    <a href="#menu" onclick="closeMobile()">Menu</a>
    <a href="#gallery" onclick="closeMobile()">Gallery</a>
    <a href="#testimonials" onclick="closeMobile()">Reviews</a>
    <a href="#reservation" onclick="closeMobile()">Reservations</a>
  </div>

  <!-- Hero -->
  <section class="hero" id="hero">
    <div class="hero-bg"></div>
    <div class="hero-particles" id="particles"></div>
    <div class="hero-content">
      <div class="hero-badge">
        <div class="hero-badge-dot"></div>
        <span>North Beach · Since 1989</span>
      </div>      <h1 class="hero-title">Sotto <em>Mare</em></h1>
      <p class="hero-subtitle">San Francisco's Iconic Italian Seafood Experience</p>
      <div class="hero-actions">
        <a href="#reservation" class="btn-primary">
          Reserve a Table
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="#menu" class="btn-secondary">Explore Menu</a>
      </div>
    </div>
    <div class="hero-waves">
      <svg viewBox="0 0 2880 120" preserveAspectRatio="none">
        <path d="M0,60 C480,120 960,0 1440,60 C1920,120 2400,0 2880,60 L2880,120 L0,120 Z" fill="white" opacity="0.03"/>
        <path d="M0,80 C480,20 960,100 1440,40 C1920,100 2400,20 2880,80 L2880,120 L0,120 Z" fill="white" opacity="0.05"/>
        <path d="M0,100 C480,60 960,120 1440,80 C1920,60 2400,100 2880,100 L2880,120 L0,120 Z" fill="white" opacity="1"/>
      </svg>
    </div>
    <div class="hero-scroll">
      <span>Scroll</span>
      <div class="scroll-line"></div>
    </div>
  </section>

  <!-- About -->
  <section class="section about" id="about">
    <div class="container">
      <div class="about-grid">
        <div class="about-image-wrapper reveal">
          <div class="about-image">
            <div class="about-image-content">
              <svg viewBox="0 0 80 80" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M40 10C25 10 15 22 15 32c0 8 5 14 12 17v10a2 2 0 004 0V49h18v10a2 2 0 004 0V49c7-3 12-9 12-17C65 22 55 10 40 10z"/>
                <path d="M30 28c0-5 4.5-9 10-9s10 4 10 9" opacity="0.6"/>
                <circle cx="35" cy="27" r="2" fill="currentColor" opacity="0.6"/>
                <circle cx="45" cy="27" r="2" fill="currentColor" opacity="0.6"/>
              </svg>
              <h3>Est. 1989</h3>
              <p>North Beach, San Francisco</p>
            </div>
          </div>
          <div class="about-image-accent"></div>
          <div class="about-experience">
            <div class="number">35+</div>
            <div class="label">Years of Excellence</div>
          </div>
        </div>
        <div class="about-text reveal">
          <div class="section-label">
            <div class="section-label-line"></div>
            <span>Our Story</span>            <div class="section-label-line"></div>
          </div>
          <h3>A Legacy of Fresh Seafood in the Heart of San Francisco</h3>
          <p>Nestled in the vibrant North Beach neighborhood, Sotto Mare has been serving the finest Italian-inspired seafood since 1989. Our commitment to fresh, sustainably sourced ingredients and time-honored recipes has made us a beloved destination for locals and visitors alike.</p>
          <p>Every dish tells a story of the sea, crafted with passion by our chefs who blend traditional Italian techniques with the freshest catch from the Pacific coast. From our legendary Cioppino to our handmade pasta, each bite is a celebration of flavor.</p>
          <div class="about-features">
            <div class="about-feature">
              <div class="about-feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
              </div>
              <span>Daily Fresh Catch</span>
            </div>
            <div class="about-feature">
              <div class="about-feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              </div>
              <span>Sustainable Sourcing</span>
            </div>
            <div class="about-feature">
              <div class="about-feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
              </div>
              <span>Made with Love</span>
            </div>
            <div class="about-feature">
              <div class="about-feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"/></svg>
              </div>
              <span>Award Winning</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Specialties -->
  <section class="section specialties" id="specialties">
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label">
          <div class="section-label-line"></div>
          <span>Chef's Selection</span>
          <div class="section-label-line"></div>
        </div>
        <h2 class="section-title">Our Signature <em>Dishes</em></h2>
        <p class="section-desc">Discover the dishes that have made Sotto Mare a San Francisco institution, each crafted with the finest ingredients from the sea.</p>
      </div>
      <div class="specialties-grid">
        <div class="specialty-card reveal">          <div class="specialty-image" style="background: linear-gradient(135deg, #1a3a5c, #2c6e9b);">
            <svg viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M30 5C18 5 10 14 10 24c0 8 6 14 12 17v8a2 2 0 004 0V39h8v8a2 2 0 004 0V41c6-3 12-9 12-17C50 14 42 5 30 5z"/><path d="M22 22c0-4 3.5-7 8-7s8 3 8 7" opacity="0.5"/><circle cx="26" cy="21" r="1.5" fill="currentColor"/><circle cx="34" cy="21" r="1.5" fill="currentColor"/></svg>
            <span class="specialty-tag">Signature</span>
          </div>
          <div class="specialty-info">
            <h3>Cioppino</h3>
            <p>Our legendary San Francisco cioppino with Dungeness crab, shrimp, clams, and mussels in a rich tomato-wine broth.</p>
            <span class="specialty-price">$42.95</span>
          </div>
        </div>
        <div class="specialty-card reveal">
          <div class="specialty-image" style="background: linear-gradient(135deg, #2c6e9b, #5ba4cf);">
            <svg viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.5"><ellipse cx="30" cy="35" rx="20" ry="12"/><path d="M10 35c0-7 9-12 20-12s20 5 20 12"/><path d="M30 23v-8M22 28l-5-6M38 28l5-6" stroke-width="1.5"/><circle cx="30" cy="12" r="2" fill="currentColor" opacity="0.5"/></svg>
            <span class="specialty-tag">Popular</span>
          </div>
          <div class="specialty-info">
            <h3>Linguine alle Vongole</h3>
            <p>Fresh linguine with Manila clams, garlic, white wine, and a hint of chili in our classic Italian preparation.</p>
            <span class="specialty-price">$28.95</span>
          </div>
        </div>
        <div class="specialty-card reveal">
          <div class="specialty-image" style="background: linear-gradient(135deg, #0a1628, #1a3a5c);">
            <svg viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M15 45h30M20 45V30c0-8 5-15 10-15s10 7 10 15v15"/><path d="M15 40h30" opacity="0.5"/><circle cx="30" cy="18" r="3" fill="currentColor" opacity="0.4"/></svg>
            <span class="specialty-tag">Chef's Pick</span>
          </div>
          <div class="specialty-info">
            <h3>Grilled Branzino</h3>
            <p>Whole Mediterranean sea bass grilled to perfection with lemon, capers, and a drizzle of extra virgin olive oil.</p>
            <span class="specialty-price">$36.95</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Menu -->
  <section class="section menu" id="menu">
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label">
          <div class="section-label-line"></div>
          <span>Our Menu</span>
          <div class="section-label-line"></div>
        </div>
        <h2 class="section-title">Explore Our <em>Culinary Offerings</em></h2>
        <p class="section-desc">From the depths of the Pacific to your plate, every dish is prepared with the freshest ingredients and Italian craftsmanship.</p>
      </div>

      <div class="menu-tabs reveal">        <button class="menu-tab active" data-tab="appetizers">Appetizers</button>
        <button class="menu-tab" data-tab="seafood">Seafood</button>
        <button class="menu-tab" data-tab="pasta">Pasta</button>
        <button class="menu-tab" data-tab="steaks">Steaks</button>
        <button class="menu-tab" data-tab="desserts">Desserts</button>
        <button class="menu-tab" data-tab="drinks">Drinks</button>
      </div>

      <!-- Appetizers -->
      <div class="menu-content active" id="appetizers">
        <div class="menu-grid">
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 12h8M12 8v8"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Calamari Fritti</span>
                <span class="menu-item-price">$16.95</span>
              </div>
              <p class="menu-item-desc">Lightly battered squid rings served with our house-made marinara and lemon aioli.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Popular</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 12h8M12 8v8"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Shrimp Scampi</span>
                <span class="menu-item-price">$18.95</span>
              </div>
              <p class="menu-item-desc">Sautéed jumbo shrimp in garlic butter, white wine, and fresh herbs with crusty bread.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 12h8M12 8v8"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Antipasto Misto</span>
                <span class="menu-item-price">$22.95</span>
              </div>              <p class="menu-item-desc">Imported Italian meats, cheeses, marinated vegetables, and fresh mozzarella.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">For Two</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 12h8M12 8v8"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Bruschetta al Pomodoro</span>
                <span class="menu-item-price">$12.95</span>
              </div>
              <p class="menu-item-desc">Grilled ciabatta topped with vine tomatoes, fresh basil, garlic, and balsamic glaze.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag gf">Vegan Option</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Seafood -->
      <div class="menu-content" id="seafood">
        <div class="menu-grid">
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Cioppino</span>
                <span class="menu-item-price">$42.95</span>
              </div>
              <p class="menu-item-desc">San Francisco's iconic seafood stew with Dungeness crab, shrimp, clams, and mussels.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Signature</span>
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Grilled Branzino</span>                <span class="menu-item-price">$36.95</span>
              </div>
              <p class="menu-item-desc">Whole Mediterranean sea bass with lemon, capers, and extra virgin olive oil.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Pan-Seared Salmon</span>
                <span class="menu-item-price">$32.95</span>
              </div>
              <p class="menu-item-desc">Wild-caught Pacific salmon with herb butter, seasonal vegetables, and lemon risotto.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Chef's Pick</span>
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Lobster Fra Diavolo</span>
                <span class="menu-item-price">$54.95</span>
              </div>
              <p class="menu-item-desc">Whole Maine lobster in our spicy tomato sauce with cherry peppers and fresh herbs.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag spicy">Spicy</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Dungeness Crab Cakes</span>
                <span class="menu-item-price">$28.95</span>
              </div>
              <p class="menu-item-desc">Hand-formed crab cakes with remoulade sauce, microgreens, and lemon wedges.</p>
              <div class="menu-item-tags">                <span class="menu-item-tag popular">Popular</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Seafood Platter</span>
                <span class="menu-item-price">$68.95</span>
              </div>
              <p class="menu-item-desc">A grand display of lobster tail, crab, shrimp, oysters, and clams for two.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">For Two</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pasta -->
      <div class="menu-content" id="pasta">
        <div class="menu-grid">
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 18h16M6 18V8c0-2 2-4 6-4s6 2 6 4v10"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Linguine alle Vongole</span>
                <span class="menu-item-price">$28.95</span>
              </div>
              <p class="menu-item-desc">Fresh linguine with Manila clams, garlic, white wine, and a touch of chili.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Signature</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 18h16M6 18V8c0-2 2-4 6-4s6 2 6 4v10"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Fettuccine Alfredo</span>
                <span class="menu-item-price">$22.95</span>
              </div>
              <p class="menu-item-desc">House-made fettuccine in a rich, creamy Parmesan sauce with fresh cracked pepper.</p>              <div class="menu-item-tags">
                <span class="menu-item-tag gf">Vegetarian</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 18h16M6 18V8c0-2 2-4 6-4s6 2 6 4v10"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Spaghetti ai Frutti di Mare</span>
                <span class="menu-item-price">$34.95</span>
              </div>
              <p class="menu-item-desc">Spaghetti with a medley of fresh seafood in a light tomato and white wine sauce.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Chef's Pick</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 18h16M6 18V8c0-2 2-4 6-4s6 2 6 4v10"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Ravioli di Ricotta</span>
                <span class="menu-item-price">$24.95</span>
              </div>
              <p class="menu-item-desc">Handmade ricotta-filled ravioli with brown butter, sage, and toasted pine nuts.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag gf">Vegetarian</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Steaks -->
      <div class="menu-content" id="steaks">
        <div class="menu-grid">
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M9 9h6v6H9z"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Filet Mignon</span>
                <span class="menu-item-price">$44.95</span>
              </div>              <p class="menu-item-desc">8oz center-cut tenderloin with truffle mashed potatoes and red wine reduction.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Premium</span>
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M9 9h6v6H9z"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">New York Strip</span>
                <span class="menu-item-price">$38.95</span>
              </div>
              <p class="menu-item-desc">12oz aged New York strip with garlic herb butter and roasted vegetables.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M9 9h6v6H9z"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Surf & Turf</span>
                <span class="menu-item-price">$56.95</span>
              </div>
              <p class="menu-item-desc">8oz filet mignon paired with lobster tail, the best of both worlds.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Best Value</span>
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M9 9h6v6H9z"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Veal Chop Milanese</span>
                <span class="menu-item-price">$42.95</span>
              </div>
              <p class="menu-item-desc">Breaded veal chop with arugula salad, cherry tomatoes, and lemon vinaigrette.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Traditional</span>              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Desserts -->
      <div class="menu-content" id="desserts">
        <div class="menu-grid">
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Tiramisu</span>
                <span class="menu-item-price">$12.95</span>
              </div>
              <p class="menu-item-desc">Classic Italian dessert with espresso-soaked ladyfingers and mascarpone cream.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Signature</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Panna Cotta</span>
                <span class="menu-item-price">$10.95</span>
              </div>
              <p class="menu-item-desc">Silky vanilla bean panna cotta with seasonal berry compote.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Cannoli Siciliani</span>
                <span class="menu-item-price">$9.95</span>
              </div>
              <p class="menu-item-desc">Crispy shells filled with sweet ricotta, chocolate chips, and candied orange.</p>
              <div class="menu-item-tags">                <span class="menu-item-tag popular">Classic</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Affogato al Caffè</span>
                <span class="menu-item-price">$8.95</span>
              </div>
              <p class="menu-item-desc">Vanilla gelato drowned in a shot of hot espresso with amaretti crumble.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag gf">Gluten Free</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Drinks -->
      <div class="menu-content" id="drinks">
        <div class="menu-grid">
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 2h8l-4 10v10H8V12z"/><path d="M12 22v-2M8 22h8"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Sotto Mare Spritz</span>
                <span class="menu-item-price">$16.00</span>
              </div>
              <p class="menu-item-desc">Our signature spritz with Aperol, prosecco, soda, and a twist of blood orange.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">House Signature</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 2h8l-4 10v10H8V12z"/><path d="M12 22v-2M8 22h8"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Negroni</span>
                <span class="menu-item-price">$15.00</span>
              </div>
              <p class="menu-item-desc">Classic gin, Campari, and sweet vermouth with an orange peel garnish.</p>              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Classic</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 2h8l-4 10v10H8V12z"/><path d="M12 22v-2M8 22h8"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Pinot Grigio — Glass</span>
                <span class="menu-item-price">$14.00</span>
              </div>
              <p class="menu-item-desc">Crisp, light Italian white wine. Perfect pairing for seafood dishes.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag gf">White Wine</span>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 2h8l-4 10v10H8V12z"/><path d="M12 22v-2M8 22h8"/></svg>
            </div>
            <div class="menu-item-info">
              <div class="menu-item-header">
                <span class="menu-item-name">Espresso Martini</span>
                <span class="menu-item-price">$17.00</span>
              </div>
              <p class="menu-item-desc">Vodka, fresh espresso, coffee liqueur, and a hint of vanilla.</p>
              <div class="menu-item-tags">
                <span class="menu-item-tag popular">Popular</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Gallery -->
  <section class="gallery" id="gallery">
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label">
          <div class="section-label-line"></div>
          <span>Gallery</span>
          <div class="section-label-line"></div>
        </div>
        <h2 class="section-title">A Glimpse of <em>Sotto Mare</em></h2>      </div>
      <div class="gallery-grid reveal">
        <div class="gallery-item" style="background: linear-gradient(135deg, #0a1628, #2c6e9b);">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 5C12 5 6 12 6 20s6 15 14 15 14-7 14-15S28 5 20 5z"/></svg>
          <div class="gallery-overlay"><span>Our Dining Room</span></div>
        </div>
        <div class="gallery-item" style="background: linear-gradient(135deg, #1a3a5c, #5ba4cf);">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="20" cy="20" r="12"/><path d="M20 8v24M8 20h24"/></svg>
          <div class="gallery-overlay"><span>Fresh Seafood</span></div>
        </div>
        <div class="gallery-item" style="background: linear-gradient(135deg, #2c6e9b, #a8d4f0);">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="5" y="10" width="30" height="20" rx="3"/><path d="M5 15h30"/></svg>
          <div class="gallery-overlay"><span>The Kitchen</span></div>
        </div>
        <div class="gallery-item" style="background: linear-gradient(135deg, #5ba4cf, #2c6e9b);">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 5l5 10h10l-8 6 3 10-10-7-10 7 3-10-8-6h10z"/></svg>
          <div class="gallery-overlay"><span>Award Winning</span></div>
        </div>
        <div class="gallery-item" style="background: linear-gradient(135deg, #1a3a5c, #0a1628);">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="20" cy="20" r="10"/><path d="M20 10c-5 0-10 5-10 10s5 10 10 10"/></svg>
          <div class="gallery-overlay"><span>Wine Cellar</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Reservation -->
  <section class="section reservation" id="reservation">
    <div class="reservation-bg"></div>
    <div class="reservation-pattern"></div>
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label">
          <div class="section-label-line"></div>
          <span>Reservations</span>
          <div class="section-label-line"></div>
        </div>
        <h2 class="section-title">Reserve Your <em>Table</em></h2>
        <p class="section-desc">Secure your spot for an unforgettable dining experience. We recommend booking in advance, especially for weekend evenings.</p>
      </div>
      <div class="reservation-grid">
        <div class="reservation-info reveal">
          <h3>Visit Us in North Beach</h3>
          <p>Whether it's a romantic dinner, a family celebration, or a night out with friends, we'll make sure your evening at Sotto Mare is nothing short of extraordinary.</p>
          <div class="reservation-details">
            <div class="reservation-detail">
              <div class="reservation-detail-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </div>
              <div class="reservation-detail-text">                <h4>Location</h4>
                <p>543 Green St, San Francisco, CA 94133</p>
              </div>
            </div>
            <div class="reservation-detail">
              <div class="reservation-detail-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              </div>
              <div class="reservation-detail-text">
                <h4>Hours</h4>
                <p>Lunch: 11:30am – 3pm · Dinner: 5pm – 10pm</p>
              </div>
            </div>
            <div class="reservation-detail">
              <div class="reservation-detail-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
              </div>
              <div class="reservation-detail-text">
                <h4>Phone</h4>
                <p>(415) 398-3181</p>
              </div>
            </div>
            <div class="reservation-detail">
              <div class="reservation-detail-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M22 6l-10 7L2 6"/></svg>
              </div>
              <div class="reservation-detail-text">
                <h4>Email</h4>
                <p>info@sottomaresf.com</p>
              </div>
            </div>
          </div>
        </div>
        <div class="reservation-form-wrapper reveal">
          <form id="reservationForm">
            <div class="form-row">
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" placeholder="John Doe" required>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" placeholder="john@example.com" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" placeholder="(415) 000-0000" required>
              </div>              <div class="form-group">
                <label for="guests">Number of Guests</label>
                <select id="guests" required>
                  <option value="">Select guests</option>
                  <option value="1">1 Guest</option>
                  <option value="2">2 Guests</option>
                  <option value="3">3 Guests</option>
                  <option value="4">4 Guests</option>
                  <option value="5">5 Guests</option>
                  <option value="6">6 Guests</option>
                  <option value="7-8">7-8 Guests</option>
                  <option value="9+">9+ (Private Dining)</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="date">Preferred Date</label>
                <input type="date" id="date" required>
              </div>
              <div class="form-group">
                <label for="time">Preferred Time</label>
                <select id="time" required>
                  <option value="">Select time</option>
                  <option value="11:30">11:30 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="12:30">12:30 PM</option>
                  <option value="13:00">1:00 PM</option>
                  <option value="13:30">1:30 PM</option>
                  <option value="14:00">2:00 PM</option>
                  <option value="17:00">5:00 PM</option>
                  <option value="17:30">5:30 PM</option>
                  <option value="18:00">6:00 PM</option>
                  <option value="18:30">6:30 PM</option>
                  <option value="19:00">7:00 PM</option>
                  <option value="19:30">7:30 PM</option>
                  <option value="20:00">8:00 PM</option>
                  <option value="20:30">8:30 PM</option>
                  <option value="21:00">9:00 PM</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group full">
                <label for="occasion">Occasion (Optional)</label>
                <select id="occasion">
                  <option value="">Select occasion</option>
                  <option value="casual">Casual Dining</option>
                  <option value="birthday">Birthday</option>
                  <option value="anniversary">Anniversary</option>                  <option value="business">Business Dinner</option>
                  <option value="date">Date Night</option>
                  <option value="celebration">Celebration</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group full">
                <label for="notes">Special Requests</label>
                <textarea id="notes" placeholder="Allergies, dietary restrictions, seating preferences..."></textarea>
              </div>
            </div>
            <button type="submit" class="form-submit" id="submitBtn">Confirm Reservation</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="section testimonials" id="testimonials">
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label">
          <div class="section-label-line"></div>
          <span>Testimonials</span>
          <div class="section-label-line"></div>
        </div>
        <h2 class="section-title">What Our Guests <em>Say</em></h2>
        <p class="section-desc">Hear from the food lovers who have experienced the magic of Sotto Mare.</p>
      </div>
      <div class="testimonials-grid">
        <div class="testimonial-card reveal">
          <div class="testimonial-stars">
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          </div>
          <p class="testimonial-text">"The Cioppino here is absolutely incredible — the best I've ever had. The atmosphere is warm and inviting, and the service is impeccable. A true San Francisco gem."</p>
          <div class="testimonial-author">
            <div class="testimonial-avatar">MR</div>
            <div>
              <div class="testimonial-name">Michael Rodriguez</div>
              <div class="testimonial-role">Food Critic, SF Chronicle</div>
            </div>
          </div>
        </div>
        <div class="testimonial-card reveal">          <div class="testimonial-stars">
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.1<think>
The user is asking me to continue generating HTML content for a restaurant website. Let me complete the remaining sections and provide the full HTML output.

Let me continue from where the output was cut off and provide the complete HTML file.
</think>

Here's the complete, premium responsive website for **Sotto Mare**:

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sotto Mare — San Francisco's Finest Italian Seafood</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
  <style>
    /* ======================== */
    /*   CSS CUSTOM PROPERTIES  */
    /* ======================== */
    :root {
      --navy: #0a1628;
      --deep-blue: #1a3a5c;
      --ocean: #2c6e9b;
      --seafoam: #5ba4cf;
      --light-blue: #a8d4f0;
      --pale-blue: #dceef8;
      --white: #ffffff;
      --cream: #f5f9fc;
      --gold: #c9a84c;
      --gold-light: #e8d49a;
      --text-dark: #1a1a2e;
      --text-muted: #6b7b8d;
      --radius: 12px;
      --radius-lg: 20px;
      --shadow-sm: 0 2px 8px rgba(10,22,40,.08);
      --shadow-md: 0 8px 30px rgba(10,22,40,.12);
      --shadow-lg: 0 20px 60px rgba(10,22,40,.15);
      --transition: all .4s cubic-bezier(.25,.46,.45,.94);
    }

    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    html { scroll-behavior:smooth; }
    body { font-family:'Inter',sans-serif; color:var(--text-dark); background:var(--white); overflow-x:hidden; }

    /* ======================== */
    /*       PRELOADER          */    /* ======================== */
    .preloader {
      position:fixed; inset:0; background:var(--navy); z-index:10000;
      display:flex; align-items:center; justify-content:center;
      transition: opacity .6s, visibility .6s;
    }
    .preloader.hidden { opacity:0; visibility:hidden; pointer-events:none; }
    .preloader-content { text-align:center; }
    .preloader-logo {
      font-family:'Playfair Display',serif; font-size:2.4rem; color:var(--white);
      letter-spacing:3px; margin-bottom:28px;
    }
    .preloader-bar {
      width:200px; height:2px; background:rgba(255,255,255,.1);
      border-radius:2px; overflow:hidden; margin:0 auto;
    }
    .preloader-bar::after {
      content:''; display:block; width:40%; height:100%; background:var(--gold);
      border-radius:2px; animation:preload 1.2s ease-in-out infinite;
    }
    @keyframes preload { 0%{transform:translateX(-100%)} 100%{transform:translateX(350%)} }

    /* ======================== */
    /*      NAVIGATION          */
    /* ======================== */
    .navbar {
      position:fixed; top:0; left:0; right:0; z-index:1000;
      padding:22px 0; transition:var(--transition);
    }
    .navbar.scrolled {
      background:rgba(255,255,255,.96); backdrop-filter:blur(20px);
      padding:14px 0; box-shadow:0 4px 30px rgba(0,0,0,.08);
    }
    .nav-container {
      max-width:1300px; margin:0 auto; padding:0 40px;
      display:flex; align-items:center; justify-content:space-between;
    }
    .nav-logo { display:flex; align-items:center; gap:12px; text-decoration:none; }
    .nav-logo-icon svg { width:38px; height:38px; }
    .nav-logo-text {
      font-family:'Playfair Display',serif; font-size:1.55rem; font-weight:700;
      color:var(--white); letter-spacing:1px; transition:var(--transition);
    }
    .navbar.scrolled .nav-logo-text { color:var(--navy); }
    .nav-links { display:flex; align-items:center; gap:34px; list-style:none; }
    .nav-links a {
      text-decoration:none; font-size:.82rem; font-weight:500; letter-spacing:1.5px;
      text-transform:uppercase; color:rgba(255,255,255,.85); transition:var(--transition);
      position:relative;
    }    .nav-links a::after {
      content:''; position:absolute; bottom:-4px; left:0; width:0; height:1.5px;
      background:var(--gold); transition:width .3s;
    }
    .nav-links a:hover::after { width:100%; }
    .navbar.scrolled .nav-links a { color:var(--text-dark); }
    .nav-links a:hover { color:var(--white); }
    .navbar.scrolled .nav-links a:hover { color:var(--ocean); }
    .nav-reserve-btn {
      padding:10px 26px; background:transparent;
      border:1.5px solid rgba(255,255,255,.5); color:var(--white);
      font-family:'Inter',sans-serif; font-size:.78rem; font-weight:600;
      letter-spacing:2px; text-transform:uppercase; cursor:pointer;
      transition:var(--transition); border-radius:4px; text-decoration:none;
    }
    .nav-reserve-btn:hover { background:var(--white); color:var(--navy); }
    .navbar.scrolled .nav-reserve-btn { border-color:var(--ocean); color:var(--ocean); }
    .navbar.scrolled .nav-reserve-btn:hover { background:var(--ocean); color:var(--white); }

    /* Hamburger */
    .hamburger { display:none; flex-direction:column; gap:5px; cursor:pointer; padding:5px; z-index:1001; }
    .hamburger span { width:24px; height:2px; background:var(--white); transition:var(--transition); border-radius:2px; }
    .navbar.scrolled .hamburger span { background:var(--navy); }
    .hamburger.active span:nth-child(1) { transform:rotate(45deg) translate(5px,5px); }
    .hamburger.active span:nth-child(2) { opacity:0; }
    .hamburger.active span:nth-child(3) { transform:rotate(-45deg) translate(5px,-5px); }

    /* Mobile Menu */
    .mobile-menu {
      display:none; position:fixed; inset:0; background:var(--navy); z-index:999;
      flex-direction:column; align-items:center; justify-content:center; gap:30px;
      opacity:0; visibility:hidden; transition:var(--transition);
    }
    .mobile-menu.active { opacity:1; visibility:visible; }
    .mobile-menu a {
      text-decoration:none; font-family:'Playfair Display',serif;
      font-size:2rem; color:var(--white); transition:var(--transition);
    }
    .mobile-menu a:hover { color:var(--gold); }

    /* ======================== */
    /*          HERO            */
    /* ======================== */
    .hero {
      position:relative; min-height:100vh; display:flex; align-items:center;
      justify-content:center; overflow:hidden; background:var(--navy);
    }
    .hero-bg {
      position:absolute; inset:0;
      background:linear-gradient(135deg,rgba(10,22,40,.82),rgba(26,58,92,.6),rgba(10,22,40,.85));    }
    .hero-particles { position:absolute; inset:0; overflow:hidden; }
    .particle {
      position:absolute; width:3px; height:3px; background:rgba(255,255,255,.15);
      border-radius:50%; animation:float-particle linear infinite;
    }
    @keyframes float-particle {
      0%{transform:translateY(100vh) rotate(0);opacity:0}
      10%{opacity:1} 90%{opacity:1} 100%{transform:translateY(-10vh) rotate(720deg);opacity:0}
    }
    .hero-content { position:relative; z-index:2; text-align:center; padding:0 20px; max-width:900px; }
    .hero-badge {
      display:inline-flex; align-items:center; gap:10px; padding:8px 24px;
      background:rgba(201,168,76,.15); border:1px solid rgba(201,168,76,.3);
      border-radius:50px; margin-bottom:30px; animation:fadeInDown 1s .3s both;
    }
    .hero-badge span { font-size:.72rem; font-weight:600; letter-spacing:3px; text-transform:uppercase; color:var(--gold); }
    .hero-badge-dot { width:6px; height:6px; background:var(--gold); border-radius:50%; }
    .hero-title {
      font-family:'Playfair Display',serif; font-size:clamp(3rem,7vw,6rem);
      font-weight:700; color:var(--white); line-height:1.05; margin-bottom:10px;
      animation:fadeInUp 1s .5s both;
    }
    .hero-title em { font-style:italic; color:var(--light-blue); }
    .hero-subtitle {
      font-family:'Cormorant Garamond',serif; font-size:clamp(1.1rem,2vw,1.5rem);
      color:rgba(255,255,255,.65); font-style:italic; margin-bottom:40px;
      animation:fadeInUp 1s .7s both;
    }
    .hero-actions {
      display:flex; align-items:center; justify-content:center; gap:20px;
      flex-wrap:wrap; animation:fadeInUp 1s .9s both;
    }
    .btn {
      padding:16px 38px; border-radius:4px; font-family:'Inter',sans-serif;
      font-size:.84rem; font-weight:600; letter-spacing:2px; text-transform:uppercase;
      cursor:pointer; transition:var(--transition); text-decoration:none; display:inline-flex;
      align-items:center; gap:10px;
    }
    .btn-primary { background:var(--gold); color:var(--navy); border:none; }
    .btn-primary:hover { background:var(--gold-light); transform:translateY(-2px); box-shadow:0 10px 30px rgba(201,168,76,.3); }
    .btn-secondary { background:transparent; color:var(--white); border:1.5px solid rgba(255,255,255,.3); }
    .btn-secondary:hover { border-color:var(--white); background:rgba(255,255,255,.08); transform:translateY(-2px); }
    .hero-scroll {
      position:absolute; bottom:36px; left:50%; transform:translateX(-50%); z-index:2;
      display:flex; flex-direction:column; align-items:center; gap:8px;
      animation:fadeInUp 1s 1.2s both;
    }
    .hero-scroll span { font-size:.68rem; letter-spacing:3px; text-transform:uppercase; color:rgba(255,255,255,.35); }
    .scroll-line { width:1px; height:40px; background:linear-gradient(to bottom,rgba(255,255,255,.35),transparent); animation:scroll-pulse 2s infinite; }    @keyframes scroll-pulse { 0%,100%{opacity:.4;transform:scaleY(1)} 50%{opacity:1;transform:scaleY(1.2)} }
    @keyframes fadeInUp { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
    @keyframes fadeInDown { from{opacity:0;transform:translateY(-20px)} to{opacity:1;transform:translateY(0)} }

    /* ======================== */
    /*    SECTION COMMON        */
    /* ======================== */
    .section { padding:110px 0; }
    .container { max-width:1300px; margin:0 auto; padding:0 40px; }
    .section-header { text-align:center; margin-bottom:65px; }
    .section-label { display:inline-flex; align-items:center; gap:12px; margin-bottom:14px; }
    .section-label-line { width:40px; height:1px; background:var(--gold); }
    .section-label span { font-size:.72rem; font-weight:600; letter-spacing:3px; text-transform:uppercase; color:var(--gold); }
    .section-title {
      font-family:'Playfair Display',serif; font-size:clamp(2rem,4vw,3.2rem);
      font-weight:700; color:var(--navy); line-height:1.2; margin-bottom:14px;
    }
    .section-title em { font-style:italic; color:var(--ocean); }
    .section-desc { font-size:1.05rem; color:var(--text-muted); max-width:600px; margin:0 auto; line-height:1.7; }

    /* ======================== */
    /*          ABOUT           */
    /* ======================== */
    .about { background:var(--cream); }
    .about-grid { display:grid; grid-template-columns:1fr 1fr; gap:70px; align-items:center; }
    .about-image-wrapper { position:relative; }
    .about-image {
      width:100%; aspect-ratio:4/5;
      background:linear-gradient(135deg,var(--deep-blue),var(--ocean));
      border-radius:var(--radius-lg); overflow:hidden;
      display:flex; align-items:center; justify-content:center;
    }
    .about-image-content { text-align:center; color:var(--white); padding:40px; }
    .about-image-content svg { width:80px; height:80px; margin-bottom:18px; opacity:.75; }
    .about-image-content h3 { font-family:'Playfair Display',serif; font-size:1.9rem; margin-bottom:8px; }
    .about-image-content p { font-size:.9rem; opacity:.65; font-style:italic; }
    .about-image-accent {
      position:absolute; top:-20px; right:-20px; width:120px; height:120px;
      border:2px solid var(--gold); border-radius:var(--radius-lg); z-index:-1;
    }
    .about-experience {
      position:absolute; bottom:-20px; left:-20px; background:var(--gold);
      color:var(--navy); padding:24px 30px; border-radius:var(--radius);
      text-align:center; box-shadow:var(--shadow-lg);
    }
    .about-experience .number { font-family:'Playfair Display',serif; font-size:2.4rem; font-weight:700; line-height:1; }
    .about-experience .label { font-size:.72rem; font-weight:600; letter-spacing:1px; text-transform:uppercase; margin-top:4px; }
    .about-text h3 { font-family:'Playfair Display',serif; font-size:1.75rem; color:var(--navy); margin-bottom:18px; line-height:1.3; }
    .about-text p { color:var(--text-muted); line-height:1.8; margin-bottom:14px; }
    .about-features { display:grid; grid-template-columns:1fr 1fr; gap:18px; margin-top:28px; }    .about-feature { display:flex; align-items:center; gap:12px; }
    .about-feature-icon {
      width:44px; height:44px; background:var(--pale-blue); border-radius:10px;
      display:flex; align-items:center; justify-content:center; flex-shrink:0;
    }
    .about-feature-icon svg { width:20px; height:20px; color:var(--ocean); }
    .about-feature span { font-size:.88rem; font-weight:500; color:var(--navy); }

    /* ======================== */
    /*      SPECIALTIES         */
    /* ======================== */
    .specialties-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:30px; }
    .specialty-card {
      background:var(--white); border-radius:var(--radius-lg); overflow:hidden;
      box-shadow:var(--shadow-sm); transition:var(--transition); border:1px solid rgba(0,0,0,.04);
    }
    .specialty-card:hover { transform:translateY(-8px); box-shadow:var(--shadow-lg); }
    .specialty-image {
      height:220px; display:flex; align-items:center; justify-content:center;
      position:relative; overflow:hidden;
    }
    .specialty-image svg { width:60px; height:60px; color:rgba(255,255,255,.55); }
    .specialty-tag {
      position:absolute; top:16px; left:16px; padding:6px 14px; background:var(--gold);
      color:var(--navy); font-size:.68rem; font-weight:700; letter-spacing:1px;
      text-transform:uppercase; border-radius:4px;
    }
    .specialty-info { padding:28px; }
    .specialty-info h3 { font-family:'Playfair Display',serif; font-size:1.35rem; color:var(--navy); margin-bottom:8px; }
    .specialty-info p { color:var(--text-muted); font-size:.9rem; line-height:1.6; margin-bottom:14px; }
    .specialty-price { font-family:'Playfair Display',serif; font-size:1.25rem; color:var(--ocean); font-weight:600; }

    /* ======================== */
    /*         MENU             */
    /* ======================== */
    .menu { background:var(--cream); }
    .menu-tabs {
      display:flex; align-items:center; justify-content:center; gap:8px;
      margin-bottom:45px; flex-wrap:wrap;
    }
    .menu-tab {
      padding:11px 26px; background:transparent; border:1.5px solid rgba(0,0,0,.1);
      border-radius:50px; font-family:'Inter',sans-serif; font-size:.8rem;
      font-weight:600; letter-spacing:1.5px; text-transform:uppercase;
      color:var(--text-muted); cursor:pointer; transition:var(--transition);
    }
    .menu-tab:hover { border-color:var(--ocean); color:var(--ocean); }
    .menu-tab.active { background:var(--ocean); border-color:var(--ocean); color:var(--white); }
    .menu-content { display:none; }
    .menu-content.active { display:block; animation:fadeInUp .5s ease; }    .menu-grid { display:grid; grid-template-columns:1fr 1fr; gap:22px; }
    .menu-item {
      display:flex; gap:18px; padding:22px; background:var(--white);
      border-radius:var(--radius); transition:var(--transition); border:1px solid rgba(0,0,0,.04);
    }
    .menu-item:hover { box-shadow:var(--shadow-md); transform:translateY(-2px); }
    .menu-item-image {
      width:76px; height:76px; border-radius:12px; flex-shrink:0;
      display:flex; align-items:center; justify-content:center;
    }
    .menu-item-image svg { width:30px; height:30px; }
    .menu-item-info { flex:1; }
    .menu-item-header { display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:5px; }
    .menu-item-name { font-family:'Playfair Display',serif; font-size:1.12rem; color:var(--navy); font-weight:600; }
    .menu-item-price { font-family:'Playfair Display',serif; font-size:1.12rem; color:var(--ocean); font-weight:600; white-space:nowrap; margin-left:12px; }
    .menu-item-desc { font-size:.86rem; color:var(--text-muted); line-height:1.5; }
    .menu-item-tags { display:flex; gap:6px; margin-top:8px; flex-wrap:wrap; }
    .menu-item-tag {
      padding:3px 10px; font-size:.66rem; font-weight:600; letter-spacing:.5px;
      text-transform:uppercase; border-radius:3px;
    }
    .tag-popular { background:rgba(201,168,76,.15); color:var(--gold); }
    .tag-spicy { background:rgba(220,53,69,.1); color:#dc3545; }
    .tag-gf { background:rgba(40,167,69,.1); color:#28a745; }

    /* ======================== */
    /*      RESERVATION         */
    /* ======================== */
    .reservation { position:relative; overflow:hidden; }
    .reservation-bg { position:absolute; inset:0; background:linear-gradient(135deg,var(--navy),var(--deep-blue)); }
    .reservation-pattern {
      position:absolute; inset:0;
      background-image:radial-gradient(circle at 2px 2px,rgba(255,255,255,.03) 1px,transparent 0);
      background-size:40px 40px;
    }
    .reservation .container { position:relative; z-index:2; }
    .reservation .section-title { color:var(--white); }
    .reservation .section-desc { color:rgba(255,255,255,.55); }
    .reservation-grid { display:grid; grid-template-columns:1fr 1.2fr; gap:60px; align-items:start; }
    .reservation-info { color:var(--white); }
    .reservation-info h3 { font-family:'Playfair Display',serif; font-size:1.55rem; margin-bottom:14px; }
    .reservation-info p { color:rgba(255,255,255,.55); line-height:1.7; margin-bottom:28px; }
    .reservation-details { display:flex; flex-direction:column; gap:20px; }
    .reservation-detail { display:flex; align-items:center; gap:16px; }
    .reservation-detail-icon {
      width:50px; height:50px; background:rgba(255,255,255,.07); border-radius:12px;
      display:flex; align-items:center; justify-content:center; flex-shrink:0;
    }
    .reservation-detail-icon svg { width:22px; height:22px; color:var(--gold); }
    .reservation-detail-text h4 { font-size:.92rem; font-weight:600; margin-bottom:2px; }    .reservation-detail-text p { font-size:.82rem; color:rgba(255,255,255,.45); margin:0; }
    .reservation-form-wrapper {
      background:var(--white); border-radius:var(--radius-lg); padding:42px;
      box-shadow:var(--shadow-xl);
    }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px; }
    .form-group { display:flex; flex-direction:column; gap:6px; }
    .form-group label { font-size:.76rem; font-weight:600; letter-spacing:1px; text-transform:uppercase; color:var(--text-dark); }
    .form-group input, .form-group select, .form-group textarea {
      padding:13px 15px; border:1.5px solid rgba(0,0,0,.1); border-radius:8px;
      font-family:'Inter',sans-serif; font-size:.92rem; color:var(--text-dark);
      transition:var(--transition); background:var(--cream); outline:none;
    }
    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
      border-color:var(--ocean); background:var(--white); box-shadow:0 0 0 3px rgba(44,110,155,.1);
    }
    .form-group textarea { resize:vertical; min-height:90px; }
    .form-submit {
      width:100%; padding:15px; background:var(--ocean); color:var(--white); border:none;
      border-radius:8px; font-family:'Inter',sans-serif; font-size:.88rem; font-weight:600;
      letter-spacing:2px; text-transform:uppercase; cursor:pointer;
      transition:var(--transition); margin-top:6px;
    }
    .form-submit:hover { background:var(--deep-blue); transform:translateY(-2px); box-shadow:0 10px 30px rgba(44,110,155,.3); }

    /* ======================== */
    /*      GALLERY             */
    /* ======================== */
    .gallery { background:var(--cream); padding:100px 0; }
    .gallery-grid {
      display:grid; grid-template-columns:repeat(4,1fr); grid-template-rows:repeat(2,200px);
      gap:16px;
    }
    .gallery-item {
      border-radius:var(--radius); overflow:hidden; position:relative; cursor:pointer;
      display:flex; align-items:center; justify-content:center; transition:var(--transition);
    }
    .gallery-item:hover { transform:scale(1.02); }
    .gallery-item:hover .gallery-overlay { opacity:1; }
    .gallery-item:nth-child(1) { grid-column:span 2; grid-row:span 2; }
    .gallery-item svg { width:40px; height:40px; color:rgba(255,255,255,.35); }
    .gallery-overlay {
      position:absolute; inset:0; background:rgba(10,22,40,.55);
      display:flex; align-items:center; justify-content:center;
      opacity:0; transition:var(--transition);
    }
    .gallery-overlay span { color:var(--white); font-family:'Playfair Display',serif; font-size:1.15rem; font-style:italic; }

    /* ======================== */
    /*     TESTIMONIALS         */    /* ======================== */
    .testimonials { background:var(--white); }
    .testimonials-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:28px; }
    .testimonial-card {
      padding:34px; background:var(--cream); border-radius:var(--radius-lg);
      transition:var(--transition); border:1px solid rgba(0,0,0,.04);
    }
    .testimonial-card:hover { box-shadow:var(--shadow-md); transform:translateY(-4px); }
    .testimonial-stars { display:flex; gap:4px; margin-bottom:16px; }
    .testimonial-stars svg { width:16px; height:16px; color:var(--gold); fill:var(--gold); }
    .testimonial-text {
      font-family:'Cormorant Garamond',serif; font-size:1.12rem; font-style:italic;
      color:var(--text-dark); line-height:1.7; margin-bottom:22px;
    }
    .testimonial-author { display:flex; align-items:center; gap:14px; }
    .testimonial-avatar {
      width:48px; height:48px; border-radius:50%; display:flex; align-items:center;
      justify-content:center; color:var(--white); font-family:'Playfair Display',serif;
      font-size:1.1rem; font-weight:600; flex-shrink:0;
    }
    .testimonial-name { font-weight:600; font-size:.92rem; color:var(--navy); }
    .testimonial-role { font-size:.78rem; color:var(--text-muted); }

    /* ======================== */
    /*        FOOTER            */
    /* ======================== */
    .footer { background:var(--navy); color:var(--white); padding:80px 0 0; }
    .footer-grid {
      display:grid; grid-template-columns:1.5fr 1fr 1fr 1fr; gap:45px;
      padding-bottom:55px; border-bottom:1px solid rgba(255,255,255,.08);
    }
    .footer-brand p { color:rgba(255,255,255,.45); line-height:1.7; margin:14px 0 22px; font-size:.88rem; }
    .footer-social { display:flex; gap:12px; }
    .footer-social a {
      width:40px; height:40px; background:rgba(255,255,255,.06); border-radius:10px;
      display:flex; align-items:center; justify-content:center; transition:var(--transition);
    }
    .footer-social a:hover { background:var(--gold); }
    .footer-social a svg { width:18px; height:18px; color:var(--white); }
    .footer-col h4 { font-family:'Playfair Display',serif; font-size:1.05rem; margin-bottom:18px; }
    .footer-col ul { list-style:none; }
    .footer-col ul li { margin-bottom:10px; }
    .footer-col ul li a { color:rgba(255,255,255,.45); text-decoration:none; font-size:.88rem; transition:var(--transition); }
    .footer-col ul li a:hover { color:var(--gold); }
    .footer-bottom {
      padding:24px 0; display:flex; align-items:center; justify-content:space-between;
      flex-wrap:wrap; gap:14px;
    }
    .footer-bottom p { font-size:.8rem; color:rgba(255,255,255,.3); }
    /* ======================== */
    /*        TOAST             */
    /* ======================== */
    .toast {
      position:fixed; bottom:30px; right:30px; background:var(--navy); color:var(--white);
      padding:20px 28px; border-radius:var(--radius); box-shadow:var(--shadow-xl);
      z-index:9999; display:flex; align-items:center; gap:14px;
      transform:translateY(120%); opacity:0; transition:var(--transition);
    }
    .toast.show { transform:translateY(0); opacity:1; }
    .toast-icon {
      width:40px; height:40px; background:#28a745; border-radius:50%;
      display:flex; align-items:center; justify-content:center; flex-shrink:0;
    }
    .toast-icon svg { width:20px; height:20px; color:#fff; }
    .toast-message h4 { font-size:.92rem; margin-bottom:2px; }
    .toast-message p { font-size:.8rem; color:rgba(255,255,255,.55); }

    /* ======================== */
    /*     SCROLL REVEAL        */
    /* ======================== */
    .reveal { opacity:0; transform:translateY(35px); transition:opacity .8s, transform .8s; }
    .reveal.visible { opacity:1; transform:translateY(0); }

    /* ======================== */
    /*      RESPONSIVE          */
    /* ======================== */
    @media(max-width:1024px) {
      .about-grid { grid-template-columns:1fr; gap:50px; }
      .specialties-grid { grid-template-columns:repeat(2,1fr); }
      .reservation-grid { grid-template-columns:1fr; }
      .testimonials-grid { grid-template-columns:repeat(2,1fr); }
      .footer-grid { grid-template-columns:repeat(2,1fr); }
      .gallery-grid { grid-template-columns:repeat(3,1fr); grid-template-rows:repeat(2,180px); }
      .gallery-item:nth-child(1) { grid-column:span 1; grid-row:span 1; }
    }
    @media(max-width:768px) {
      .nav-links, .nav-reserve-btn { display:none; }
      .hamburger { display:flex; }
      .mobile-menu { display:flex; }
      .container { padding:0 20px; }
      .section { padding:80px 0; }
      .section-header { margin-bottom:40px; }
      .specialties-grid { grid-template-columns:1fr; }
      .menu-grid { grid-template-columns:1fr; }
      .menu-item { flex-direction:column; }
      .menu-item-image { width:100%; height:110px; }
      .form-row { grid-template-columns:1fr; }
      .reservation-form-wrapper { padding:26px; }
      .testimonials-grid { grid-template-columns:1fr; }      .footer-grid { grid-template-columns:1fr; gap:28px; }
      .gallery-grid { grid-template-columns:repeat(2,1fr); grid-template-rows:repeat(3,150px); }
      .hero-title { font-size:2.6rem; }
      .about-features { grid-template-columns:1fr; }
    }
    @media(max-width:480px) {
      .hero-title { font-size:2rem; }
      .hero-actions { flex-direction:column; width:100%; }
      .btn { width:100%; justify-content:center; text-align:center; }
      .menu-tab { padding:9px 16px; font-size:.7rem; }
    }
  </style>
</head>
<body>

  <!-- ========== PRELOADER ========== -->
  <div class="preloader" id="preloader">
    <div class="preloader-content">
      <div class="preloader-logo">SOTTO MARE</div>
      <div class="preloader-bar"></div>
    </div>
  </div>

  <!-- ========== NAVIGATION ========== -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="#" class="nav-logo">
        <div class="nav-logo-icon">
          <svg viewBox="0 0 50 50" fill="currentColor"><path d="M25 3C14 3 7 12 7 21c0 7 5 12 11 14v9a2 2 0 004 0V35h6v9a2 2 0 004 0v-9c6-2 11-7 11-14C43 12 36 3 25 3z"/><path d="M17 18c0-5 3.5-8 8-8s8 3 8 8" fill="none" stroke="rgba(255,255,255,.5)" stroke-width="1.5"/><circle cx="21" cy="16" r="1.5" fill="rgba(255,255,255,.6)"/><circle cx="29" cy="16" r="1.5" fill="rgba(255,255,255,.6)"/></svg>
        </div>
        <span class="nav-logo-text">Sotto Mare</span>
      </a>
      <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#specialties">Specialties</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#testimonials">Reviews</a></li>
      </ul>
      <a href="#reservation" class="nav-reserve-btn">Reserve</a>
      <div class="hamburger" id="hamburger"><span></span><span></span><span></span></div>
    </div>
  </nav>
  <div class="mobile-menu" id="mobileMenu">
    <a href="#about" onclick="closeMobile()">About</a>
    <a href="#specialties" onclick="closeMobile()">Specialties</a>
    <a href="#menu" onclick="closeMobile()">Menu</a>
    <a href="#gallery" onclick="closeMobile()">Gallery</a>
    <a href="#testimonials" onclick="closeMobile()">Reviews</a>
    <a href="#reservation" onclick="closeMobile()">Reservations</a>  </div>

  <!-- ========== HERO ========== -->
  <section class="hero" id="hero">
    <div class="hero-bg"></div>
    <div class="hero-particles" id="particles"></div>
    <div class="hero-content">
      <div class="hero-badge"><div class="hero-badge-dot"></div><span>North Beach · Since 1989</span></div>
      <h1 class="hero-title">Sotto <em>Mare</em></h1>
      <p class="hero-subtitle">San Francisco's Iconic Italian Seafood Experience</p>
      <div class="hero-actions">
        <a href="#reservation" class="btn btn-primary">Reserve a Table <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        <a href="#menu" class="btn btn-secondary">Explore Menu</a>
      </div>
    </div>
    <div class="hero-scroll"><span>Scroll</span><div class="scroll-line"></div></div>
  </section>

  <!-- ========== ABOUT ========== -->
  <section class="section about" id="about">
    <div class="container">
      <div class="about-grid">
        <div class="about-image-wrapper reveal">
          <div class="about-image">
            <div class="about-image-content">
              <svg viewBox="0 0 80 80" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M40 8C26 8 16 18 16 30c0 9 6 16 14 19v11a2 2 0 004 0V49h12v11a2 2 0 004 0V49c8-3 14-10 14-19C64 18 54 8 40 8z"/><path d="M31 28c0-5 4-9 9-9s9 4 9 9" opacity=".5"/><circle cx="36" cy="26" r="2" fill="currentColor" opacity=".5"/><circle cx="44" cy="26" r="2" fill="currentColor" opacity=".5"/></svg>
              <h3>Est. 1989</h3>
              <p>North Beach, San Francisco</p>
            </div>
          </div>
          <div class="about-image-accent"></div>
          <div class="about-experience"><div class="number">35+</div><div class="label">Years of Excellence</div></div>
        </div>
        <div class="about-text reveal">
          <div class="section-label"><div class="section-label-line"></div><span>Our Story</span><div class="section-label-line"></div></div>
          <h3>A Legacy of Fresh Seafood in the Heart of San Francisco</h3>
          <p>Nestled in the vibrant North Beach neighborhood, Sotto Mare has been serving the finest Italian-inspired seafood since 1989. Our commitment to sustainably sourced ingredients and time-honored recipes has made us a beloved destination.</p>
          <p>Every dish tells a story of the sea, crafted with passion by our chefs who blend traditional Italian techniques with the freshest catch from the Pacific coast. From our legendary Cioppino to handmade pasta, each bite is a celebration.</p>
          <div class="about-features">
            <div class="about-feature"><div class="about-feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div><span>Daily Fresh Catch</span></div>
            <div class="about-feature"><div class="about-feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><span>Sustainable Sourcing</span></div>
            <div class="about-feature"><div class="about-feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></div><span>Made with Love</span></div>
            <div class="about-feature"><div class="about-feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"/></svg></div><span>Award Winning</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== SPECIALTIES ========== -->  <section class="section specialties" id="specialties">
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label"><div class="section-label-line"></div><span>Chef's Selection</span><div class="section-label-line"></div></div>
        <h2 class="section-title">Our Signature <em>Dishes</em></h2>
        <p class="section-desc">Discover the dishes that have made Sotto Mare a San Francisco institution.</p>
      </div>
      <div class="specialties-grid">
        <div class="specialty-card reveal">
          <div class="specialty-image" style="background:linear-gradient(135deg,#1a3a5c,#2c6e9b)">
            <svg viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M30 5C18 5 10 14 10 24c0 8 6 14 12 17v8a2 2 0 004 0V39h8v8a2 2 0 004 0V41c6-3 12-9 12-17C50 14 42 5 30 5z"/><path d="M22 22c0-4 3.5-7 8-7s8 3 8 7" opacity=".5"/><circle cx="26" cy="21" r="1.5" fill="currentColor"/><circle cx="34" cy="21" r="1.5" fill="currentColor"/></svg>
            <span class="specialty-tag">Signature</span>
          </div>
          <div class="specialty-info">
            <h3>Cioppino</h3>
            <p>Legendary San Francisco cioppino with Dungeness crab, shrimp, clams, and mussels in a rich tomato-wine broth.</p>
            <span class="specialty-price">$42.95</span>
          </div>
        </div>
        <div class="specialty-card reveal">
          <div class="specialty-image" style="background:linear-gradient(135deg,#2c6e9b,#5ba4cf)">
            <svg viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.5"><ellipse cx="30" cy="35" rx="20" ry="12"/><path d="M10 35c0-7 9-12 20-12s20 5 20 12"/><path d="M30 23v-8M22 28l-5-6M38 28l5-6"/><circle cx="30" cy="12" r="2" fill="currentColor" opacity=".4"/></svg>
            <span class="specialty-tag">Popular</span>
          </div>
          <div class="specialty-info">
            <h3>Linguine alle Vongole</h3>
            <p>Fresh linguine with Manila clams, garlic, white wine, and a hint of chili in classic Italian preparation.</p>
            <span class="specialty-price">$28.95</span>
          </div>
        </div>
        <div class="specialty-card reveal">
          <div class="specialty-image" style="background:linear-gradient(135deg,#0a1628,#1a3a5c)">
            <svg viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M15 45h30M20 45V30c0-8 5-15 10-15s10 7 10 15v15"/><path d="M15 40h30" opacity=".5"/><circle cx="30" cy="18" r="3" fill="currentColor" opacity=".3"/></svg>
            <span class="specialty-tag">Chef's Pick</span>
          </div>
          <div class="specialty-info">
            <h3>Grilled Branzino</h3>
            <p>Whole Mediterranean sea bass grilled to perfection with lemon, capers, and extra virgin olive oil.</p>
            <span class="specialty-price">$36.95</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== MENU ========== -->
  <section class="section menu" id="menu">
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label"><div class="section-label-line"></div><span>Our Menu</span><div class="section-label-line"></div></div>        <h2 class="section-title">Explore Our <em>Culinary Offerings</em></h2>
        <p class="section-desc">From the depths of the Pacific to your plate — every dish crafted with Italian craftsmanship.</p>
      </div>
      <div class="menu-tabs reveal">
        <button class="menu-tab active" data-tab="appetizers">Appetizers</button>
        <button class="menu-tab" data-tab="seafood">Seafood</button>
        <button class="menu-tab" data-tab="pasta">Pasta</button>
        <button class="menu-tab" data-tab="steaks">Steaks</button>
        <button class="menu-tab" data-tab="desserts">Desserts</button>
        <button class="menu-tab" data-tab="drinks">Drinks</button>
      </div>

      <!-- Appetizers -->
      <div class="menu-content active" id="appetizers">
        <div class="menu-grid">
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 12h8M12 8v8"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Calamari Fritti</span><span class="menu-item-price">$16.95</span></div><p class="menu-item-desc">Lightly battered squid rings with house-made marinara and lemon aioli.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Popular</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 12h8M12 8v8"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Shrimp Scampi</span><span class="menu-item-price">$18.95</span></div><p class="menu-item-desc">Jumbo shrimp in garlic butter, white wine, and fresh herbs with crusty bread.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 12h8M12 8v8"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Antipasto Misto</span><span class="menu-item-price">$22.95</span></div><p class="menu-item-desc">Imported Italian meats, cheeses, marinated vegetables, and fresh mozzarella.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">For Two</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/><path d="M8 12h8M12 8v8"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Bruschetta al Pomodoro</span><span class="menu-item-price">$12.95</span></div><p class="menu-item-desc">Grilled ciabatta topped with vine tomatoes, basil, garlic, and balsamic glaze.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">Vegan Option</span></div></div></div>
        </div>
      </div>

      <!-- Seafood -->
      <div class="menu-content" id="seafood">
        <div class="menu-grid">
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Cioppino</span><span class="menu-item-price">$42.95</span></div><p class="menu-item-desc">SF's iconic seafood stew with Dungeness crab, shrimp, clams, and mussels.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Signature</span><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Grilled Branzino</span><span class="menu-item-price">$36.95</span></div><p class="menu-item-desc">Whole Mediterranean sea bass with lemon, capers, and olive oil.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Pan-Seared Salmon</span><span class="menu-item-price">$32.95</span></div><p class="menu-item-desc">Wild-caught Pacific salmon with herb butter, seasonal vegetables, and lemon risotto.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Chef's Pick</span><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Lobster Fra Diavolo</span><span class="menu-item-price">$54.95</span></div><p class="menu-item-desc">Whole Maine lobster in spicy tomato sauce with cherry peppers and fresh herbs.</p><div class="menu-item-tags"><span class="menu-item-tag tag-spicy">Spicy</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Dungeness Crab Cakes</span><span class="menu-item-price">$28.95</span></div><p class="menu-item-desc">Hand-formed crab cakes with remoulade sauce, microgreens, and lemon wedges.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Popular</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M12 5c-4 0-7 3-7 6s3 6 7 6 7-3 7-6-3-6-7-6z"/><path d="M12 5v-2M8 8l-2-2M16 8l2-2"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Seafood Platter for Two</span><span class="menu-item-price">$68.95</span></div><p class="menu-item-desc">Grand display of lobster tail, crab, shrimp, oysters, and clams for two.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">For Two</span></div></div></div>
        </div>
      </div>

      <!-- Pasta -->
      <div class="menu-content" id="pasta">
        <div class="menu-grid">
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M4 18h16M6 18V8c0-2 2-4 6-4s6 2 6 4v10"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Linguine alle Vongole</span><span class="menu-item-price">$28.95</span></div><p class="menu-item-desc">Fresh linguine with Manila clams, garlic, white wine, and a touch of chili.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Signature</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M4 18h16M6 18V8c0-2 2-4 6-4s6 2 6 4v10"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Fettuccine Alfredo</span><span class="menu-item-price">$22.95</span></div><p class="menu-item-desc">House-made fettuccine in rich creamy Parmesan with fresh cracked pepper.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">Vegetarian</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M4 18h16M6 18V8c0-2 2-4 6-4s6 2 6 4v10"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Spaghetti ai Frutti di Mare</span><span class="menu-item-price">$34.95</span></div><p class="menu-item-desc">Spaghetti with medley of fresh seafood in light tomato and white wine sauce.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Chef's Pick</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M4 18h16M6 18V8c0-2 2-4 6-4s6 2 6 4v10"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Ravioli di Ricotta</span><span class="menu-item-price">$24.95</span></div><p class="menu-item-desc">Handmade ricotta-filled ravioli with brown butter, sage, and toasted pine nuts.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">Vegetarian</span></div></div></div>
        </div>
      </div>

      <!-- Steaks -->
      <div class="menu-content" id="steaks">
        <div class="menu-grid">
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M9 9h6v6H9z"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Filet Mignon</span><span class="menu-item-price">$44.95</span></div><p class="menu-item-desc">8oz center-cut tenderloin with truffle mashed potatoes and red wine reduction.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Premium</span><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M9 9h6v6H9z"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">New York Strip</span><span class="menu-item-price">$38.95</span></div><p class="menu-item-desc">12oz aged New York strip with garlic herb butter and roasted vegetables.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M9 9h6v6H9z"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Surf & Turf</span><span class="menu-item-price">$56.95</span></div><p class="menu-item-desc">8oz filet mignon paired with lobster tail — the best of both worlds.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Best Value</span><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M9 9h6v6H9z"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Veal Chop Milanese</span><span class="menu-item-price">$42.95</span></div><p class="menu-item-desc">Breaded veal chop with arugula salad, cherry tomatoes, and lemon vinaigrette.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Traditional</span></div></div></div>
        </div>
      </div>

      <!-- Desserts -->
      <div class="menu-content" id="desserts">
        <div class="menu-grid">
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Tiramisu</span><span class="menu-item-price">$12.95</span></div><p class="menu-item-desc">Classic Italian dessert with espresso-soaked ladyfingers and mascarpone cream.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Signature</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Panna Cotta</span><span class="menu-item-price">$10.95</span></div><p class="menu-item-desc">Silky vanilla bean panna cotta with seasonal berry compote.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Cannoli Siciliani</span><span class="menu-item-price">$9.95</span></div><p class="menu-item-desc">Crispy shells filled with sweet ricotta, chocolate chips, and candied orange.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Classic</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Affogato al Caffè</span><span class="menu-item-price">$8.95</span></div><p class="menu-item-desc">Vanilla gelato drowned in a shot of hot espresso with amaretti crumble.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">Gluten Free</span></div></div></div>
        </div>
      </div>

      <!-- Drinks -->
      <div class="menu-content" id="drinks">
        <div class="menu-grid">
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M8 2h8l-4 10v10H8V12z"/><path d="M12 22v-2M8 22h8"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Sotto Mare Spritz</span><span class="menu-item-price">$16.00</span></div><p class="menu-item-desc">Signature spritz with Aperol, prosecco, soda, and a twist of blood orange.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">House Signature</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M8 2h8l-4 10v10H8V12z"/><path d="M12 22v-2M8 22h8"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Negroni</span><span class="menu-item-price">$15.00</span></div><p class="menu-item-desc">Classic gin, Campari, and sweet vermouth with an orange peel garnish.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Classic</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M8 2h8l-4 10v10H8V12z"/><path d="M12 22v-2M8 22h8"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Pinot Grigio — Glass</span><span class="menu-item-price">$14.00</span></div><p class="menu-item-desc">Crisp, light Italian white wine. Perfect pairing for seafood dishes.</p><div class="menu-item-tags"><span class="menu-item-tag tag-gf">White Wine</span></div></div></div>
          <div class="menu-item"><div class="menu-item-image" style="background:linear-gradient(135deg,#dceef8,#a8d4f0)"><svg viewBox="0 0 24 24" fill="none" stroke="var(--ocean)" stroke-width="1.5"><path d="M8 2h8l-4 10v10H8V12z"/><path d="M12 22v-2M8 22h8"/></svg></div><div class="menu-item-info"><div class="menu-item-header"><span class="menu-item-name">Espresso Martini</span><span class="menu-item-price">$17.00</span></div><p class="menu-item-desc">Vodka, fresh espresso, coffee liqueur, and a hint of vanilla.</p><div class="menu-item-tags"><span class="menu-item-tag tag-popular">Popular</span></div></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== GALLERY ========== -->
  <section class="gallery" id="gallery">
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label"><div class="section-label-line"></div><span>Gallery</span><div class="section-label-line"></div></div>
        <h2 class="section-title">A Glimpse of <em>Sotto Mare</em></h2>
      </div>
      <div class="gallery-grid reveal">
        <div class="gallery-item" style="background:linear-gradient(135deg,#0a1628,#2c6e9b)"><svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="6" y="8" width="28" height="24" rx="3"/><circle cx="15" cy="18" r="3"/><path d="M6 26l8-6 6 4 8-8"/></svg><div class="gallery-overlay"><span>Our Dining Room</span></div></div>
        <div class="gallery-item" style="background:linear-gradient(135deg,#1a3a5c,#5ba4cf)"><svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="20" cy="20" r="12"/><path d="M20 8v24M8 20h24"/></svg><div class="gallery-overlay"><span>Fresh Seafood</span></div></div>
        <div class="gallery-item" style="background:linear-gradient(135deg,#2c6e9b,#a8d4f0)"><svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="5" y="10" width="30" height="20" rx="3"/><path d="M5 15h30"/></svg><div class="gallery-overlay"><span>The Kitchen</span></div></div>
        <div class="gallery-item" style="background:linear-gradient(135deg,#5ba4cf,#2c6e9b)"><svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 5l5 10h10l-8 6 3 10-10-7-10 7 3-10-8-6h10z"/></svg><div class="gallery-overlay"><span>Award Winning</span></div></div>
        <div class="gallery-item" style="background:linear-gradient(135deg,#1a3a5c,#0a1628)"><svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="20" cy="20" r="10"/><path d="M20 10c-5 0-10 5-10 10s5 10 10 10"/></svg><div class="gallery-overlay"><span>Wine Cellar</span></div></div>
      </div>
    </div>
  </section>

  <!-- ========== RESERVATION ========== -->
  <section class="section reservation" id="reservation">
    <div class="reservation-bg"></div>
    <div class="reservation-pattern"></div>
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label"><div class="section-label-line"></div><span>Reservations</span><div class="section-label-line"></div></div>        <h2 class="section-title">Reserve Your <em>Table</em></h2>
        <p class="section-desc">Secure your spot for an unforgettable dining experience. We recommend booking in advance.</p>
      </div>
      <div class="reservation-grid">
        <div class="reservation-info reveal">
          <h3>Visit Us in North Beach</h3>
          <p>Whether it's a romantic dinner, family celebration, or night out with friends — we'll make sure your evening at Sotto Mare is extraordinary.</p>
          <div class="reservation-details">
            <div class="reservation-detail"><div class="reservation-detail-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div><div class="reservation-detail-text"><h4>Location</h4><p>543 Green St, San Francisco, CA 94133</p></div></div>
            <div class="reservation-detail"><div class="reservation-detail-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div><div class="reservation-detail-text"><h4>Hours</h4><p>Lunch: 11:30 am – 3 pm · Dinner: 5 pm – 10 pm</p></div></div>
            <div class="reservation-detail"><div class="reservation-detail-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg></div><div class="reservation-detail-text"><h4>Phone</h4><p>(415) 398-3181</p></div></div>
            <div class="reservation-detail"><div class="reservation-detail-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M22 6l-10 7L2 6"/></svg></div><div class="reservation-detail-text"><h4>Email</h4><p>info@sottomaresf.com</p></div></div>
          </div>
        </div>
        <div class="reservation-form-wrapper reveal">
          <form id="reservationForm">
            <div class="form-row">
              <div class="form-group"><label for="name">Full Name</label><input type="text" id="name" placeholder="John Doe" required></div>
              <div class="form-group"><label for="email">Email Address</label><input type="email" id="email" placeholder="john@example.com" required></div>
            </div>
            <div class="form-row">
              <div class="form-group"><label for="phone">Phone Number</label><input type="tel" id="phone" placeholder="(415) 000-0000" required></div>
              <div class="form-group"><label for="guests">Number of Guests</label>
                <select id="guests" required><option value="">Select guests</option><option value="1">1 Guest</option><option value="2">2 Guests</option><option value="3">3 Guests</option><option value="4">4 Guests</option><option value="5">5 Guests</option><option value="6">6 Guests</option><option value="7-8">7–8 Guests</option><option value="9+">9+ (Private Dining)</option></select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group"><label for="date">Preferred Date</label><input type="date" id="date" required></div>
              <div class="form-group"><label for="time">Preferred Time</label>
                <select id="time" required><option value="">Select time</option><option value="11:30">11:30 AM</option><option value="12:00">12:00 PM</option><option value="12:30">12:30 PM</option><option value="13:00">1:00 PM</option><option value="13:30">1:30 PM</option><option value="14:00">2:00 PM</option><option value="17:00">5:00 PM</option><option value="17:30">5:30 PM</option><option value="18:00">6:00 PM</option><option value="18:30">6:30 PM</option><option value="19:00">7:00 PM</option><option value="19:30">7:30 PM</option><option value="20:00">8:00 PM</option><option value="20:30">8:30 PM</option><option value="21:00">9:00 PM</option></select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group"><label for="occasion">Occasion (Optional)</label>
                <select id="occasion"><option value="">Select occasion</option><option value="casual">Casual Dining</option><option value="birthday">Birthday</option><option value="anniversary">Anniversary</option><option value="business">Business Dinner</option><option value="date">Date Night</option><option value="celebration">Celebration</option></select>
              </div>
              <div class="form-group"><label for="notes">Special Requests</label><textarea id="notes" placeholder="Allergies, dietary restrictions, seating preferences…"></textarea></div>
            </div>
            <button type="submit" class="form-submit" id="submitBtn">Confirm Reservation</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== TESTIMONIALS ========== -->
  <section class="section testimonials" id="testimonials">
    <div class="container">
      <div class="section-header reveal">
        <div class="section-label"><div class="section-label-line"></div><span>Testimonials</span><div class="section-label-line"></div></div>        <h2 class="section-title">What Our Guests <em>Say</em></h2>
        <p class="section-desc">Hear from the food lovers who have experienced the magic of Sotto Mare.</p>
      </div>
      <div class="testimonials-grid">
        <div class="testimonial-card reveal">
          <div class="testimonial-stars"><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
          <p class="testimonial-text">"The Cioppino here is absolutely incredible — the best I've ever had. The atmosphere is warm and inviting, and the service is impeccable. A true San Francisco gem."</p>
          <div class="testimonial-author"><div class="testimonial-avatar" style="background:linear-gradient(135deg,var(--ocean),var(--seafoam))">MR</div><div><div class="testimonial-name">Michael Rodriguez</div><div class="testimonial-role">Food Critic, SF Chronicle</div></div></div>
        </div>
        <div class="testimonial-card reveal">
          <div class="testimonial-stars"><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
          <p class="testimonial-text">"We've been coming to Sotto Mare for our anniversary every year for a decade. The consistency and quality never disappoints. It feels like coming home."</p>
          <div class="testimonial-author"><div class="testimonial-avatar" style="background:linear-gradient(135deg,var(--gold),var(--gold-light))">SK</div><div><div class="testimonial-name">Sarah & Kevin Chen</div><div class="testimonial-role">Loyal Guests Since 2014</div></div></div>
        </div>
        <div class="testimonial-card reveal">
          <div class="testimonial-stars"><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
          <p class="testimonial-text">"As a chef myself, I'm blown away by the quality and authenticity. The Linguine alle Vongole is textbook perfection. A must-visit for any seafood lover."</p>
          <div class="testimonial-author"><div class="testimonial-avatar" style="background:linear-gradient(135deg,#1a3a5c,var(--ocean))">LP</div><div><div class="testimonial-name">Chef Lorenzo Pellegrini</div><div class="testimonial-role">James Beard Nominee</div></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FOOTER ========== -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="#" class="nav-logo" style="margin-bottom:4px"><div class="nav-logo-icon"><svg viewBox="0 0 50 50" fill="var(--gold)"><path d="M25 3C14 3 7 12 7 21c0 7 5 12 11 14v9a2 2 0 004 0V35h6v9a2 2 0 004 0v-9c6-2 11-7 11-14C43 12 36 3 25 3z"/></svg></div><span class="nav-logo-text">Sotto Mare</span></a>
          <p>Serving San Francisco's finest Italian seafood since 1989. Fresh catch, timeless recipes, unforgettable experiences.</p>
          <div class="footer-social">
            <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg></a>
            <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"/></svg></a>
            <a href="#" aria-label="Twitter"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg></a>
            <a href="#" aria-label="Yelp"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-6h2v6zm4 0h-2v-6h2v6zm-2-8a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/></svg></a>
          </div>
        </div>
        <div class="footer-col">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#about">Our Story</a></li>
            <li><a href="#menu">Full Menu</a></li>
            <li><a href="#reservation">Reservations</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#">Private Events</a></li>
            <li><a href="#">Gift Cards</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Hours</h4>          <ul>
            <li><a href="#">Monday – Thursday</a></li>
            <li><a href="#" style="color:rgba(255,255,255,.7)">11:30 am – 10 pm</a></li>
            <li><a href="#">Friday – Saturday</a></li>
            <li><a href="#" style="color:rgba(255,255,255,.7)">11:30 am – 11 pm</a></li>
            <li><a href="#">Sunday</a></li>
            <li><a href="#" style="color:rgba(255,255,255,.7)">12 pm – 9 pm</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Contact</h4>
          <ul>
            <li><a href="#">543 Green St</a></li>
            <li><a href="#">San Francisco, CA 94133</a></li>
            <li><a href="tel:4153983181">(415) 398-3181</a></li>
            <li><a href="mailto:info@sottomaresf.com">info@sottomaresf.com</a></li>
            <li><a href="#">North Beach Neighborhood</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 Sotto Mare Osteria Mozzarella. All rights reserved.</p>
        <p>Crafted with ❤️ in San Francisco</p>
      </div>
    </div>
  </footer>

  <!-- ========== TOAST ========== -->
  <div class="toast" id="toast">
    <div class="toast-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg></div>
    <div class="toast-message"><h4>Reservation Confirmed!</h4><p>We'll send a confirmation to your email shortly.</p></div>
  </div>

  <!-- ========== JAVASCRIPT ========== -->
  <script>
    // Preloader
    window.addEventListener('load', () => {
      setTimeout(() => document.getElementById('preloader').classList.add('hidden'), 800);
    });

    // Particles
    const particlesEl = document.getElementById('particles');
    for (let i = 0; i < 30; i++) {
      const p = document.createElement('div');
      p.classList.add('particle');
      p.style.left = Math.random() * 100 + '%';
      p.style.animationDuration = (Math.random() * 10 + 8) + 's';
      p.style.animationDelay = (Math.random() * 10) + 's';
      p.style.width = p.style.height = (Math.random() * 3 + 1) + 'px';
      particlesEl.appendChild(p);    }

    // Navbar scroll
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 60);
    });

    // Hamburger
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      mobileMenu.classList.toggle('active');
      document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
    });
    function closeMobile() {
      hamburger.classList.remove('active');
      mobileMenu.classList.remove('active');
      document.body.style.overflow = '';
    }

    // Menu tabs
    document.querySelectorAll('.menu-tab').forEach(tab => {
      tab.addEventListener('click', () => {
        document.querySelectorAll('.menu-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.menu-content').forEach(c => c.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById(tab.dataset.tab).classList.add('active');
      });
    });

    // Set min date to today
    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);

    // Reservation form
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const btn = document.getElementById('submitBtn');
      btn.disabled = true;
      btn.textContent = 'Submitting…';

      setTimeout(() => {
        btn.disabled = false;
        btn.textContent = 'Confirm Reservation';
        this.reset();
        const toast = document.getElementById('toast');
        toast.classList.add('show');        setTimeout(() => toast.classList.remove('show'), 4500);
      }, 1500);
    });

    // Scroll reveal
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    reveals.forEach(el => observer.observe(el));
  </script>
</body>
</html>
