<!DOCTYPE html>

<html class="dark" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ITCJ Services Marketplace</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b8cee",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                        "surface-dark": "#18232f",
                        "text-main-dark": "#e0e0e0",
                        "text-secondary-dark": "#9dabb9",
                        "border-dark": "#283039"
                    },
                    fontFamily: {
                        "display": ["Space Grotesk", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-text-main-dark">
    <div class="relative flex min-h-screen w-full flex-col">
        <!-- TopNavBar -->

        <main class="flex w-full flex-1 flex-col items-center py-10 px-6">
            <div class="flex w-full max-w-7xl flex-col gap-8">
                <!-- PageHeading -->
                <div class="flex flex-col items-center gap-3 text-center">
                    <p class="text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]">Technical
                        Services Marketplace</p>
                    <p class="text-text-secondary-dark text-base font-normal leading-normal max-w-lg">Find the technical
                        help you need, offered by fellow students from ITCJ.</p>
                </div>
                <!-- SearchBar -->
                <div class="w-full max-w-2xl mx-auto">
                    <label class="flex flex-col h-12 w-full">
                        <div class="flex w-full flex-1 items-stretch rounded-lg h-full bg-surface-dark">
                            <div class="text-text-secondary-dark flex items-center justify-center pl-4">
                                <span class="material-symbols-outlined">search</span>
                            </div>
                            <input
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden text-white focus:outline-0 focus:ring-0 border-none bg-surface-dark h-full placeholder:text-text-secondary-dark px-4 pl-2 text-base font-normal leading-normal"
                                placeholder="Search for services like 'PC repair'..." value="" />
                        </div>
                    </label>
                </div>
                <!-- Chips -->
                <div class="flex flex-wrap justify-center gap-3">
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-primary px-4 text-white text-sm font-medium leading-normal">All</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-dark px-4 text-white text-sm font-medium leading-normal transition-colors hover:bg-border-dark">Software
                        Installation</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-dark px-4 text-white text-sm font-medium leading-normal transition-colors hover:bg-border-dark">Hardware
                        Repair</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-dark px-4 text-white text-sm font-medium leading-normal transition-colors hover:bg-border-dark">Web
                        Development</button>
                    <button
                        class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-dark px-4 text-white text-sm font-medium leading-normal transition-colors hover:bg-border-dark">Technical
                        Support</button>
                </div>
                <!-- ImageGrid -->
                <div class="grid grid-cols-[repeat(auto-fill,minmax(240px,1fr))] gap-6">
                    <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"
                            data-alt="A person working on a laptop with code on the screen"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA-GLA3VH_fpGOLgVDScwWBGd53ukaDkVePeBYp7UWfgA5RuTxLuOmgIbNDhZpBwFBoqR6-anTu5iTiaW95SMrBhP3xHwxLvv-S-lQvPngnVDyy_D7CSs0dT9otZXgQGrINjNeFc3gi3Ksb788A1en8ZqkIE9xj4QqBkgG0a2vSbQbChd3sEweyPxwDwMfuNZEnZywVbue420nyW-5XouzYlnRizTb_0mvVSHFzBbnagqzZbOXnT8Lh3n17nzeAK7_llDdgrhHdknA");'>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">PC Formatting &amp; Optimization
                            </p>
                            <p class="text-text-secondary-dark text-sm font-normal leading-normal">Complete system
                                cleanup and performance boost.</p>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">$350 MXN</p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                    href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"
                            data-alt="Abstract colorful code lines on a dark background"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDBXz97w3RvIEV269ALcT2pGVt4oVsj8dI_92hL5YRoX1f8G3MTDCjuEXEnlZ1vXPSyIgghL3DtC8SI2H8M24ZhfShQK8OsTgidHa-naPaLFSHyllYzXoXWXq_o9SpWUAonkQAaoTdY-4-qLcsLb4nWm4SrNqG-_7DkSol5TzB1r5MUiuKZe-vALY2cgbX_aKWaxPVxz1_JmdWLtXrEZwDIPT48qWurMQbU_pZRRf2_I2_ajsTS9qkjsy6IcQxhL9tuhItqmC8pw4k");'>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">Custom Website Development</p>
                            <p class="text-text-secondary-dark text-sm font-normal leading-normal">From landing pages to
                                full e-commerce sites.</p>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">$1500 MXN</p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                    href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"
                            data-alt="A magnifying glass over a computer screen with a bug icon"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuALnv1M02fuL_jcjJW4HaIKihJWgYrZV15OaCDDF3UmDfbiGg92U0skCnKOLyj0OvJIFYY4sYaCwPf5Sl-Quks2BOJav_zrE7CyKCDLUyvddpCIRcZoegbxmapu5y4XGDo71SBQIn9QJEGko8bd_YbUTTRVA1vuGjtPcyofGPy3Pi2foEASoZwBaTxm4Cg7Ez7VYT7oyDxE8NZjaNEQ5hISP5eY9t3gtE2LCnCdaeLEP10veHDguOpVDKrBA86ZVQvPjceXP8WmLAE");'>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">Virus and Malware Removal</p>
                            <p class="text-text-secondary-dark text-sm font-normal leading-normal">Secure your system
                                and protect your data.</p>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">$400 MXN</p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                    href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"
                            data-alt="An open laptop with a broken screen"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBVIAy68n_PMKohnIT0dRIs0YVjdopeVJ3G4CHBhXTSMMCXHb011ae_b7k94Pfr0pRFBn460kqLHo_m_OVsgcbkBkI5prD8416dqaXIX4BvxQVDEO8cdzMwwPZ0sOVorP0k3Mpj0Nz1Ob4UpH9f56154duLNwk48V8vj37YqpxFGW_TVdR6zGg6V60cbERfssX7lKl2To6YurxYBB3i2LqStQ5vG-tA4y29-CwU3UuqaM-yun3Ak8CwhPNVSbcb4qd366jSCQtmhY0");'>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">Laptop Screen Replacement</p>
                            <p class="text-text-secondary-dark text-sm font-normal leading-normal">Professional repair
                                for cracked or faulty screens.</p>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">$800 MXN</p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                    href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"
                            data-alt="Various software logos on a digital background"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCo4S3yJvjDZ8tgJulAfltBe8oS2J-wfo1loO5erDDCW1X8kieZ4K-YMqUjGd_cn6gtS36kX8Jx4gn_FnGBuAtAt1eUkBNtnFvGW6eam1FzqzAc2SYxRmHexAOh7ugneRRXzl-m7uHxCy3m4e-XwyFrauaMuUEhOla-vjvdcUVd0LGImf2eKgTyMTHTz0RRapq8d2weoVozXWFbjk54QGOjWjVBMP7dX8psTbquFznVyxbDxXHYEzOr1GngZgfhcQgqMlK2AgqrRiM");'>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">Software Installation Service</p>
                            <p class="text-text-secondary-dark text-sm font-normal leading-normal">Hassle-free setup
                                for any application.</p>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">$200 MXN</p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                    href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"
                            data-alt="A hard drive opened up showing the internal platters"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDwKzebGiLcT7XZ70aXDKhvysmxcic-iqDBhPzJYX_bFkjqfZoLBizIQ2jFhuJ1M3evVf7Srp0unlfKXRwCfbo_UZvKQLg4ApB6rCY9hLKjzNRk9vjLjgurhXAonNGLMTrFwNAfLb5cfwUJOqbNG7bnYPZgeJpIrnjmFxkKSy0yst1e8TFayjJK6ptrUyMqRoUiAhbFG0HrTWG5PqaT-cEaqOaLddJUG1rdCeusLo-Hfy9LCkGh7jviN9soOHdtFdao6-x_svACfpU");'>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">Data Recovery</p>
                            <p class="text-text-secondary-dark text-sm font-normal leading-normal">Recover lost files
                                from damaged drives.</p>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">$500 MXN</p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                    href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"
                            data-alt="Network servers in a data center"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAYQztkW9CNyg3mHyQqLOpXrPne7Bc_sFQT9-ygORRJoSSI6Ogo3bkY3Fh1wZdW_Yb1o2nKW5RjUg_arl7pBrcMvGHjTjDqfh_tvcogrgUSK1rLMUGfUDWBseGigc1TxiBoEHOFdFrZWMH6_qbdkomKW885w-LyGlgvWFFyU9cUaTuFbRBPqGJwHGkva9CVPE3WSh3YJ2MY-8UzJUZQlYOx8TMNmYUdbFb04QcFosnH_-HJq76LydlL2Mv6shX4AztScTyakzmEhUg");'>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">Network Configuration</p>
                            <p class="text-text-secondary-dark text-sm font-normal leading-normal">Home and small
                                office network setup.</p>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">$450 MXN</p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                    href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="group flex cursor-pointer flex-col gap-3 rounded-xl bg-surface-dark p-4 transition-all hover:-translate-y-1 hover:shadow-2xl hover:shadow-primary/10">
                        <div class="w-full bg-center bg-no-repeat aspect-[4/3] bg-cover rounded-lg overflow-hidden"
                            data-alt="Computer hardware components like RAM and CPU on a motherboard"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuANn8rTWXpwm0TKH8Ty_46ZALNJEfelAfqNaNDFkMMmFQeMn6TWbLcA6a0QzrP9bfsvyOm3yyS4pCy8Zoz0R70FW94GTR5p9TMOH7FwUrV629F2sx2oZQAfHpxr2ddcsdFjn7g9B_WO0HJ1KmDwG9prkqqDLhcsGZov0drOWsekMdSubcWOOUGl2COo7w9R2LNeKSjjGKHqEQHXdrql3l4WbjsXjlMKivMFdlVC-LkgvaD3Cr_7TJ5mhJh-_7Rkak-SUhMtJLaf8R8");'>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-white text-base font-bold leading-normal">Hardware Upgrade</p>
                            <p class="text-text-secondary-dark text-sm font-normal leading-normal">Boost your PC's
                                speed with new components.</p>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-white text-base font-bold leading-normal">$300 MXN</p>
                                <a class="text-primary text-sm font-medium leading-normal opacity-0 group-hover:opacity-100 transition-opacity"
                                    href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="flex items-center justify-center gap-2 pt-6">
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-dark text-text-secondary-dark transition-colors hover:bg-border-dark">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary text-white">1</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-dark text-text-main-dark transition-colors hover:bg-border-dark">2</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-dark text-text-main-dark transition-colors hover:bg-border-dark">3</button>
                    <button
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-dark text-text-secondary-dark transition-colors hover:bg-border-dark">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
