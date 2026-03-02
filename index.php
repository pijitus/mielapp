<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[NOMBRE EMPRESA] | Premium Argentine Honey Export</title>
    <meta name="description" content="High-quality Argentine honey for international export. Pure, sustainable, and certified.">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        honeyGold: '#D4AF37',
                        honeyCream: '#FDFBF7',
                        honeyDark: '#1A1A1B',
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        /* Estilos para el slideshow del Hero */
        #hero-header {
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
        }
        /* Clase para el idioma activo */
        .lang-active {
            color: #D4AF37; /* honeyGold */
            font-weight: bold;
            pointer-events: none;
        }
        /* Clase para el idioma inactivo */
        .lang-inactive {
            color: #9CA3AF; /* gray-400 */
            cursor: pointer;
        }
        .lang-inactive:hover {
            color: #D4AF37;
        }
    </style>
</head>
<body class="bg-honeyCream text-honeyDark font-sans">

    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-serif font-bold tracking-wider flex items-center">
                <span class="text-honeyGold mr-2">⬢</span> [EMPRESA]
            </div>
            
            <div class="hidden md:flex items-center space-x-8 font-semibold text-sm uppercase tracking-widest">
                <a href="#history" id="nav-story" class="hover:text-honeyGold transition">Story</a>
                <a href="#products" id="nav-products" class="hover:text-honeyGold transition">Products</a>
                <a href="#certifications" id="nav-quality" class="hover:text-honeyGold transition">Quality</a>
                <a href="#contact" id="nav-contact" class="bg-honeyGold text-white px-5 py-3 rounded hover:bg-honeyDark transition shadow-md">Contact Us</a>
            </div>
            
            <div class="text-sm font-bold border-l pl-6 border-gray-300 ml-4 flex gap-2">
                <span id="lang-en" onclick="changeLanguage('en')" class="lang-active">EN</span>
                <span>|</span>
                <span id="lang-es" onclick="changeLanguage('es')" class="lang-inactive">ES</span>
            </div>
        </div>
    </nav>

    <header id="hero-header" class="h-screen flex items-center justify-center text-white text-center px-4 pt-20 relative">
        <div class="absolute inset-0 bg-black/40 z-0"></div>
        
        <div class="max-w-4xl animate-fade-in-up z-10 relative">
            <h1 id="hero-title" class="font-serif text-5xl md:text-7xl mb-6 drop-shadow-lg leading-tight">The Golden Soul of the Argentine Pampas</h1>
            <p id="hero-subtitle" class="text-xl md:text-2xl font-light mb-10 italic drop-shadow-md max-w-2xl mx-auto">Premium Export-Grade Honey. Pure, traceable, and directly from our hives to the world.</p>
            <a href="#products" id="hero-cta" class="border-2 border-honeyGold bg-honeyGold hover:bg-transparent hover:text-honeyGold text-white font-bold py-4 px-10 rounded-full transition duration-300 uppercase tracking-widest shadow-lg hover:shadow-honeyGold/50 inline-block">View Catalog</a>
        </div>
    </header>

    <section id="history" class="py-32 max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-20 items-center">
            <div class="pr-8">
                <span id="story-badge" class="text-honeyGold font-semibold tracking-widest uppercase text-sm bg-honeyGold/10 px-3 py-1 rounded-full">Our Heritage</span>
                <h2 id="story-title" class="font-serif text-4xl mt-4 mb-8">A Family Legacy in the Heart of Argentina</h2>
                <p id="story-p1" class="text-gray-600 leading-relaxed mb-6 text-lg">
                    Founded in the fertile lands of Argentina, our company represents three generations of beekeeping excellence. We combine traditional wisdom with modern technology to harvest honey that preserves the biodiversity of our native forests and pampas.
                </p>
                <p id="story-p2" class="text-gray-600 leading-relaxed text-lg">
                    Our strategic location allows us to offer unique floral profiles, ensuring a 100% natural product, free of agrochemicals, and fully traceable from the honeycomb to the final shipment.
                </p>
            </div>
            <div class="flex gap-6 h-full items-center justify-center">
                <img src="https://media3.colourbox.com/NHMIIAcfxh7ao-2AH0gF9hCoX9bpaRhsxjT71Mn9w2Q/resize:fit:800:800:1/q:70/aHR0cHM6Ly9tZWRpYS5jb2xvdXJib3guY29tL0NsRjdvSEVTdXRYY25xekxGVEx1TVNKbEUtR3NVSnBnWVBTVG5iZldvZTgvcmVzaXplOmZpdDoxNjAwOjE2MDA6MS9wbGFpbi9teXMzL2NvbG91cmJveC5wbG92cGVubmluZy5maWxlL0NPTE9VUkJPWDYxMTM0MjYzLmpwZw==" class="w-1/2 h-96 object-cover rounded-2xl shadow-2xl transform md:-translate-y-8 hover:translate-y-0 transition duration-500" alt="Beekeeper holding frame">
                <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&q=80&w=600" class="w-1/2 h-96 object-cover rounded-2xl shadow-2xl transform md:translate-y-8 hover:translate-y-0 transition duration-500" alt="Argentine Pampas landscape">
            </div>
        </div>
    </section>

    <section id="certifications" class="bg-white py-16 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
             <p id="certs-title" class="text-center text-gray-400 text-sm tracking-widest uppercase mb-8">Certified Quality for Global Markets</p>
            <div class="flex flex-wrap justify-center md:justify-between items-center opacity-50 grayscale hover:grayscale-0 transition duration-500 gap-8">
                <div class="text-center font-bold text-xl border-2 border-gray-300 p-4 rounded-lg">SENASA <span class="block text-xs font-normal">Argentina</span></div>
                <div class="text-center font-bold text-xl border-2 border-gray-300 p-4 rounded-lg">HACCP <span class="block text-xs font-normal">Certified</span></div>
                <div class="text-center font-bold text-xl border-2 border-gray-300 p-4 rounded-lg">ORGANIC <span class="block text-xs font-normal">USDA / EU</span></div>
                <div class="text-center font-bold text-xl border-2 border-gray-300 p-4 rounded-lg">FDA <span class="block text-xs font-normal">Registered</span></div>
            </div>
        </div>
    </section>

    <section id="products" class="py-32 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 id="prod-title" class="font-serif text-5xl mb-6">Export Catalog</h2>
                 <p id="prod-subtitle" class="text-gray-500 max-w-xl mx-auto">Discover our range of premium honey prepared specifically for international distributors and food manufacturers.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-12">
                <div class="bg-white shadow-md hover:shadow-2xl transition-all duration-300 rounded-2xl overflow-hidden group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="img/catalogo/image_3.png" alt="Multifloral Honey Jar" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                         <div class="absolute top-4 right-4 bg-white/90 text-honeyDark text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Retail Ready</div>
                    </div>
                    <div class="p-8">
                        <h3 id="p1-title" class="font-serif text-2xl mb-4 group-hover:text-honeyGold transition">Multifloral Honey</h3>
                        <p id="p1-desc" class="text-gray-500 mb-6">The essence of our diverse prairies. Rich, balanced, and perfect for retail distribution. A versatile choice for any market.</p>
                        <ul class="text-sm text-gray-500 space-y-2 border-t pt-6">
                            <li class="flex items-center"><span class="text-honeyGold mr-2">✓</span> <span id="p1-spec1">Origin: Pampas Region</span></li>
                            <li class="flex items-center"><span class="text-honeyGold mr-2">✓</span> <span id="p1-spec2">Color: Extra Light Amber (ELA)</span></li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white shadow-md hover:shadow-2xl transition-all duration-300 rounded-2xl overflow-hidden group relative border-t-4 border-honeyGold">
                     <div class="absolute top-4 right-4 bg-honeyGold text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Premium Select</div>
                    <div class="relative h-64 overflow-hidden">
                        <img src="img/catalogo/image_4.png" alt="Eucalyptus Honey Jar" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    </div>
                    <div class="p-8">
                        <h3 id="p2-title" class="font-serif text-2xl mb-4 group-hover:text-honeyGold transition">Eucalyptus Mono-floral</h3>
                        <p id="p2-desc" class="text-gray-500 mb-6">Distinctive strong aroma with caramel notes and medicinal properties. Highly sought after in European and Asian markets.</p>
                         <ul class="text-sm text-gray-500 space-y-2 border-t pt-6">
                            <li class="flex items-center"><span class="text-honeyGold mr-2">✓</span> <span id="p2-spec1">Origin: Northern Argentine Forests</span></li>
                            <li class="flex items-center"><span class="text-honeyGold mr-2">✓</span> <span id="p2-spec2">High Pollen Count Certified</span></li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white shadow-md hover:shadow-2xl transition-all duration-300 rounded-2xl overflow-hidden group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="img/catalogo/image_5.png" alt="Bulk Honey Drum" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                         <div class="absolute top-4 right-4 bg-honeyDark text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Industrial</div>
                    </div>
                    <div class="p-8">
                        <h3 id="p3-title" class="font-serif text-2xl mb-4 group-hover:text-honeyGold transition">Bulk & Industrial</h3>
                        <p id="p3-desc" class="text-gray-500 mb-6">High-volume solutions for food industry manufacturers and packers worldwide. Homogenized batches available.</p>
                         <ul class="text-sm text-gray-500 space-y-2 border-t pt-6">
                            <li class="flex items-center"><span class="text-honeyGold mr-2">✓</span> <span id="p3-spec1">Packaging: 300kg Steel Drums / IBC</span></li>
                            <li class="flex items-center"><span class="text-honeyGold mr-2">✓</span> <span id="p3-spec2">Full Lab Analysis Included</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-32 max-w-5xl mx-auto px-6 relative">
        <div class="absolute -top-10 -left-10 text-honeyGold/10 text-9xl font-serif hidden md:block">“</div>
        
        <div class="bg-honeyDark text-white p-12 md:p-16 rounded-3xl shadow-2xl relative z-10 flex flex-wrap md:flex-nowrap gap-12">
            <div class="md:w-1/3">
                <h2 id="form-title" class="font-serif text-4xl mb-6 text-honeyGold">B2B Inquiry for Importers</h2>
                <p id="form-subtitle" class="text-gray-400 mb-8 text-lg leading-relaxed">We specialize in international logistics. Let us know your requirements and we will provide a formal quote (FOB/CIF) within 24 hours.</p>
                <div class="text-sm text-gray-400 space-y-2">
                    <p>Email: export@[empresa].com.ar</p>
                    <p>WhatsApp: +54 9 11 1234 5678</p>
                </div>
            </div>

            <form action="#" class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label id="label-name" class="block text-xs uppercase tracking-wider mb-3 text-honeyGold">Full Name *</label>
                    <input type="text" class="w-full bg-white/5 border border-white/10 p-4 rounded-lg focus:outline-none focus:border-honeyGold transition text-white" required>
                </div>
                <div>
                    <label id="label-company" class="block text-xs uppercase tracking-wider mb-3 text-honeyGold">Company Name *</label>
                    <input type="text" class="w-full bg-white/5 border border-white/10 p-4 rounded-lg focus:outline-none focus:border-honeyGold transition text-white" required>
                </div>
                <div>
                    <label id="label-country" class="block text-xs uppercase tracking-wider mb-3 text-honeyGold">Destination Country *</label>
                    <input type="text" id="input-country" class="w-full bg-white/5 border border-white/10 p-4 rounded-lg focus:outline-none focus:border-honeyGold transition text-white" placeholder="e.g. Germany, USA" required>
                </div>
                <div>
                    <label id="label-product" class="block text-xs uppercase tracking-wider mb-3 text-honeyGold">Product Interest</label>
                    <select class="w-full bg-white/5 border border-white/10 p-4 rounded-lg focus:outline-none focus:border-honeyGold transition text-gray-300 cursor-pointer">
                        <option id="opt-multi">Multifloral Honey</option>
                        <option id="opt-euca">Eucalyptus Honey</option>
                        <option id="opt-bulk">Bulk (Drums/IBC)</option>
                        <option id="opt-other">Other</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label id="label-message" class="block text-xs uppercase tracking-wider mb-3 text-honeyGold">Message / Volume Requirements *</label>
                    <textarea id="input-message" rows="4" class="w-full bg-white/5 border border-white/10 p-4 rounded-lg focus:outline-none focus:border-honeyGold transition text-white" placeholder="Please indicate estimated annual volume needs..." required></textarea>
                </div>
                <button id="form-btn" class="md:col-span-2 bg-honeyGold hover:bg-white hover:text-honeyDark text-white font-bold py-5 rounded-lg transition duration-300 uppercase tracking-[0.2em] shadow-lg mt-4">Request Official Quote</button>
            </form>
        </div>
    </section>

    <footer class="bg-honeyDark text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center md:text-left md:flex justify-between items-center">
            <div class="mb-8 md:mb-0">
                <div class="font-serif text-2xl mb-4 text-honeyGold">[NOMBRE EMPRESA]</div>
                <p class="text-gray-400 text-sm">Headquarters: Buenos Aires Province, Argentina<br>Hives Location: Argentine Pampas & North</p>
            </div>
            
            <div class="flex flex-col items-center md:items-end">
                <div class="flex space-x-8 mb-6">
                    <a href="#" class="text-gray-400 hover:text-honeyGold transition">LinkedIn</a>
                    <a href="#" class="text-gray-400 hover:text-honeyGold transition">Instagram</a>
                </div>
                 <p class="text-xs text-gray-500 uppercase tracking-widest">© 2024 [EMPRESA]. All Rights Reserved. Pure Argentine Origin.</p>
            </div>
        </div>
    </footer>

    <button id="backToTop" class="fixed bottom-8 right-8 bg-honeyGold text-white w-12 h-12 rounded-full shadow-2xl opacity-0 transition-all duration-300 z-50 hover:bg-honeyDark flex items-center justify-center group" aria-label="Back to top">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform group-hover:-translate-y-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <script>
        // --- HERO SLIDESHOW SCRIPT ---
        const heroImages = [
            'img/hero/image_0.png', // Apiary at sunset
            'img/hero/image_1.png', // Honey flowing
            'img/hero/image_2.png'  // Beekeeper with frame
        ];
        let currentImageIndex = 0;
        const heroHeader = document.getElementById('hero-header');

        function changeHeroImage() {
            heroHeader.style.backgroundImage = `url('${heroImages[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % heroImages.length;
        }

        // Set initial image and start interval
        changeHeroImage();
        setInterval(changeHeroImage, 5000); // Change image every 5 seconds


        // --- LANGUAGE SWITCHER SCRIPT ---
        const translations = {
            en: {
                nav: { story: "Story", products: "Products", quality: "Quality", contact: "Contact Us" },
                hero: { title: "The Golden Soul of the Argentine Pampas", subtitle: "Premium Export-Grade Honey. Pure, traceable, and directly from our hives to the world.", cta: "View Catalog" },
                story: { badge: "Our Heritage", title: "A Family Legacy in the Heart of Argentina", p1: "Founded in the fertile lands of Argentina, our company represents three generations of beekeeping excellence. We combine traditional wisdom with modern technology to harvest honey that preserves the biodiversity of our native forests and pampas.", p2: "Our strategic location allows us to offer unique floral profiles, ensuring a 100% natural product, free of agrochemicals, and fully traceable from the honeycomb to the final shipment." },
                certs: { title: "Certified Quality for Global Markets" },
                prod: { title: "Export Catalog", subtitle: "Discover our range of premium honey prepared specifically for international distributors and food manufacturers." },
                p1: { title: "Multifloral Honey", desc: "The essence of our diverse prairies. Rich, balanced, and perfect for retail distribution. A versatile choice for any market.", spec1: "Origin: Pampas Region", spec2: "Color: Extra Light Amber (ELA)" },
                p2: { title: "Eucalyptus Mono-floral", desc: "Distinctive strong aroma with caramel notes and medicinal properties. Highly sought after in European and Asian markets.", spec1: "Origin: Northern Argentine Forests", spec2: "High Pollen Count Certified" },
                p3: { title: "Bulk & Industrial", desc: "High-volume solutions for food industry manufacturers and packers worldwide. Homogenized batches available.", spec1: "Packaging: 300kg Steel Drums / IBC", spec2: "Full Lab Analysis Included" },
                form: { title: "B2B Inquiry for Importers", subtitle: "We specialize in international logistics. Let us know your requirements and we will provide a formal quote (FOB/CIF) within 24 hours.", labelName: "Full Name *", labelCompany: "Company Name *", labelCountry: "Destination Country *", inputCountryPlaceholder: "e.g. Germany, USA", labelProduct: "Product Interest", optMulti: "Multifloral Honey", optEuca: "Eucalyptus Honey", optBulk: "Bulk (Drums/IBC)", optOther: "Other", labelMessage: "Message / Volume Requirements *", inputMessagePlaceholder: "Please indicate estimated annual volume needs...", btn: "Request Official Quote" }
            },
            es: {
                nav: { story: "Historia", products: "Productos", quality: "Calidad", contact: "Contacto" },
                hero: { title: "El Alma Dorada de la Pampa Argentina", subtitle: "Miel Premium de Calidad Exportación. Pura, trazable y directamente de nuestras colmenas al mundo.", cta: "Ver Catálogo" },
                story: { badge: "Nuestra Herencia", title: "Un Legado Familiar en el Corazón de Argentina", p1: "Fundada en las tierras fértiles de Argentina, nuestra empresa representa tres generaciones de excelencia apícola. Combinamos la sabiduría tradicional con tecnología moderna para cosechar miel que preserva la biodiversidad de nuestros bosques y pampas nativas.", p2: "Nuestra ubicación estratégica nos permite ofrecer perfiles florales únicos, asegurando un producto 100% natural, libre de agroquímicos y totalmente trazable desde el panal hasta el embarque final." },
                certs: { title: "Calidad Certificada para Mercados Globales" },
                prod: { title: "Catálogo de Exportación", subtitle: "Descubra nuestra gama de miel premium preparada específicamente para distribuidores internacionales y fabricantes de alimentos." },
                p1: { title: "Miel Multifloral", desc: "La esencia de nuestras diversas praderas. Rica, equilibrada y perfecta para distribución minorista. Una elección versátil para cualquier mercado.", spec1: "Origen: Región Pampeana", spec2: "Color: Ámbar Extra Claro (ELA)" },
                p2: { title: "Miel de Eucalipto (Monofloral)", desc: "Distintivo aroma fuerte con notas de caramelo y propiedades medicinales. Muy solicitada en mercados europeos y asiáticos.", spec1: "Origen: Bosques del Norte Argentino", spec2: "Certificado de Alto Contenido Polínico" },
                p3: { title: "Granel e Industrial", desc: "Soluciones de alto volumen para fabricantes de alimentos y envasadores de todo el mundo. Lotes homogeneizados disponibles.", spec1: "Envase: Tambores de Acero 300kg / IBC", spec2: "Análisis de Laboratorio Completo Incluido" },
                form: { title: "Consulta B2B para Importadores", subtitle: "Nos especializamos en logística internacional. Indíquenos sus requerimientos y le proporcionaremos una cotización formal (FOB/CIF) en 24 horas.", labelName: "Nombre Completo *", labelCompany: "Nombre de la Empresa *", labelCountry: "País de Destino *", inputCountryPlaceholder: "ej. Alemania, EEUU", labelProduct: "Interés del Producto", optMulti: "Miel Multifloral", optEuca: "Miel de Eucalipto", optBulk: "Granel (Tambores/IBC)", optOther: "Otro", labelMessage: "Mensaje / Requerimientos de Volumen *", inputMessagePlaceholder: "Por favor indique necesidades estimadas de volumen anual...", btn: "Solicitar Cotización Oficial" }
            }
        };

        function changeLanguage(lang) {
            const t = translations[lang];

            // Navegación
            document.getElementById('nav-story').innerText = t.nav.story;
            document.getElementById('nav-products').innerText = t.nav.products;
            document.getElementById('nav-quality').innerText = t.nav.quality;
            document.getElementById('nav-contact').innerText = t.nav.contact;

            // Hero
            document.getElementById('hero-title').innerText = t.hero.title;
            document.getElementById('hero-subtitle').innerText = t.hero.subtitle;
            document.getElementById('hero-cta').innerText = t.hero.cta;

            // Story
            document.getElementById('story-badge').innerText = t.story.badge;
            document.getElementById('story-title').innerText = t.story.title;
            document.getElementById('story-p1').innerText = t.story.p1;
            document.getElementById('story-p2').innerText = t.story.p2;

            // Certs
            document.getElementById('certs-title').innerText = t.certs.title;

            // Products Header
            document.getElementById('prod-title').innerText = t.prod.title;
            document.getElementById('prod-subtitle').innerText = t.prod.subtitle;

            // Product 1
            document.getElementById('p1-title').innerText = t.p1.title;
            document.getElementById('p1-desc').innerText = t.p1.desc;
            document.getElementById('p1-spec1').innerText = t.p1.spec1;
            document.getElementById('p1-spec2').innerText = t.p1.spec2;

            // Product 2
            document.getElementById('p2-title').innerText = t.p2.title;
            document.getElementById('p2-desc').innerText = t.p2.desc;
            document.getElementById('p2-spec1').innerText = t.p2.spec1;
            document.getElementById('p2-spec2').innerText = t.p2.spec2;

            // Product 3
            document.getElementById('p3-title').innerText = t.p3.title;
            document.getElementById('p3-desc').innerText = t.p3.desc;
            document.getElementById('p3-spec1').innerText = t.p3.spec1;
            document.getElementById('p3-spec2').innerText = t.p3.spec2;

            // Form
            document.getElementById('form-title').innerText = t.form.title;
            document.getElementById('form-subtitle').innerText = t.form.subtitle;
            document.getElementById('label-name').innerText = t.form.labelName;
            document.getElementById('label-company').innerText = t.form.labelCompany;
            document.getElementById('label-country').innerText = t.form.labelCountry;
            document.getElementById('input-country').placeholder = t.form.inputCountryPlaceholder;
            document.getElementById('label-product').innerText = t.form.labelProduct;
            document.getElementById('opt-multi').innerText = t.form.optMulti;
            document.getElementById('opt-euca').innerText = t.form.optEuca;
            document.getElementById('opt-bulk').innerText = t.form.optBulk;
            document.getElementById('opt-other').innerText = t.form.optOther;
            document.getElementById('label-message').innerText = t.form.labelMessage;
            document.getElementById('input-message').placeholder = t.form.inputMessagePlaceholder;
            document.getElementById('form-btn').innerText = t.form.btn;

            // Actualizar estilos de los botones de idioma
            if (lang === 'en') {
                document.getElementById('lang-en').className = 'lang-active';
                document.getElementById('lang-es').className = 'lang-inactive';
            } else {
                document.getElementById('lang-es').className = 'lang-active';
                document.getElementById('lang-en').className = 'lang-inactive';
            }
        }

        // --- BACK TO TOP BUTTON SCRIPT ---
        const backToTopBtn = document.getElementById('backToTop');

        window.onscroll = function() {
            // Si el usuario baja más de 400px, mostramos el botón
            if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
                backToTopBtn.style.opacity = "1";
                backToTopBtn.style.pointerEvents = "auto";
            } else {
                backToTopBtn.style.opacity = "0";
                backToTopBtn.style.pointerEvents = "none";
            }
        };

        backToTopBtn.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>
</body>
</html>