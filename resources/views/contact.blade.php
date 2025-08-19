import React from "react";
import { Helmet } from "react-helmet-async";
import { useForm } from "react-hook-form";
import { z } from "zod";
import { zodResolver } from "@hookform/resolvers/zod";
import { toast } from "sonner";
import { MapPin, Phone, Mail, Clock, CircleDot } from "lucide-react";

import { Card, CardContent, CardHeader, CardTitle, CardDescription } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { AspectRatio } from "@/components/ui/aspect-ratio";
import {
Form,
FormField,
FormItem,
FormLabel,
FormControl,
FormMessage,
} from "@/components/ui/form";

const contactSchema = z.object({
name: z.string().min(2, "Nama minimal 2 karakter"),
phone: z
.string()
.min(8, "Nomor telepon tidak valid")
.max(20, "Nomor telepon terlalu panjang"),
email: z.string().email("Email tidak valid"),
message: z.string().min(10, "Pesan minimal 10 karakter"),
});

type ContactFormValues = z.infer<typeof contactSchema>;

  const faqs = [
  {
  q: "Bagaimana cara melakukan reservasi?",
  a: "Anda dapat menghubungi kami melalui formulir kontak di halaman ini atau melalui telepon/WhatsApp untuk melakukan
  reservasi.",
  },
  {
  q: "Apakah tersedia pemandu wisata?",
  a: "Ya, kami menyediakan pemandu wisata profesional yang dapat dipesan sesuai kebutuhan Anda.",
  },
  {
  q: "Metode pembayaran apa yang diterima?",
  a: "Kami menerima transfer bank, kartu debit/kredit tertentu, serta pembayaran digital populer.",
  },
  {
  q: "Jam operasional layanan pelanggan?",
  a: "Senin–Jumat 08.00–17.00, Sabtu–Minggu 07.00–18.00.",
  },
  ];

  const Contact: React.FC = () => {
  const form = useForm<ContactFormValues>({
    resolver: zodResolver(contactSchema),
    defaultValues: {
    name: "",
    phone: "",
    email: "",
    message: "",
    },
    });

    const onSubmit = (values: ContactFormValues) => {
    console.log("Contact form submitted:", values);
    toast.success("Terima kasih! Pesan Anda telah terkirim.");
    form.reset();
    };

    const canonical = typeof window !== "undefined" ? `${window.location.origin}/contact` : "/contact";

    const faqJsonLd = {
    '@context': 'https://schema.org',
    '@type': 'FAQPage',
    mainEntity: faqs.map((f) => ({
    '@type': 'Question',
    name: f.q,
    acceptedAnswer: {
    '@type': 'Answer',
    text: f.a,
    },
    })),
    };

    return (
    <>
      <Helmet>
        <title>Hubungi Kami | Wisata - Kontak Resmi</title>
        <meta name="description"
          content="Hubungi kami untuk pertanyaan, reservasi, dan informasi wisata. Dapatkan alamat, telepon, email, dan jam operasional di halaman kontak ini." />
        <link rel="canonical" href={canonical} />
        <script type="application/ld+json">{JSON.stringify(faqJsonLd)}</script>
      </Helmet>

      <header className="border-b bg-muted/30">
        <div className="container mx-auto px-4 py-10 md:py-14">
          <h1 className="text-3xl md:text-4xl font-bold tracking-tight text-foreground text-center">Hubungi Kami</h1>
          <p className="mt-3 max-w-2xl mx-auto text-center text-muted-foreground">
            Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus ex sapien vitae pellentesque.
          </p>
        </div>
      </header>

      <main className="container mx-auto px-4 py-8 md:py-12">
        <section className="grid gap-6 md:gap-8 md:grid-cols-3">
          <Card className="md:col-span-2">
            <CardHeader>
              <CardTitle>Kirim Pesan</CardTitle>
              <CardDescription>
                Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus ex sapien vitae pellentesque.
              </CardDescription>
            </CardHeader>
            <CardContent>
              <Form {...form}>
                <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-4">
                  <div className="grid gap-4 md:grid-cols-2">
                    <FormField control={form.control} name="name" render={({ field })=> (
                      <FormItem>
                        <FormLabel>Nama Lengkap</FormLabel>
                        <FormControl>
                          <Input placeholder="Masukkan nama lengkap" {...field} />
                        </FormControl>
                        <FormMessage />
                      </FormItem>
                      )}
                      />

                      <FormField control={form.control} name="phone" render={({ field })=> (
                        <FormItem>
                          <FormLabel>Nomor Telepon</FormLabel>
                          <FormControl>
                            <Input placeholder="contoh: +62 812 3456 7890" {...field} />
                          </FormControl>
                          <FormMessage />
                        </FormItem>
                        )}
                        />
                  </div>

                  <FormField control={form.control} name="email" render={({ field })=> (
                    <FormItem>
                      <FormLabel>Email</FormLabel>
                      <FormControl>
                        <Input type="email" placeholder="nama@email.com" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                    )}
                    />

                    <FormField control={form.control} name="message" render={({ field })=> (
                      <FormItem>
                        <FormLabel>Pesan</FormLabel>
                        <FormControl>
                          <Textarea placeholder="Tulis pesan Anda di sini..." className="min-h-[140px]" {...field} />
                        </FormControl>
                        <FormMessage />
                      </FormItem>
                      )}
                      />

                      <div className="pt-2">
                        <Button type="submit" className="w-full md:w-auto">Kirim Pesan</Button>
                      </div>
                </form>
              </Form>
            </CardContent>
          </Card>

          <div className="space-y-4">
            <Card>
              <CardHeader className="flex flex-row items-start gap-3">
                <div className="rounded-md p-2 bg-primary/10 text-primary">
                  <MapPin className="size-5" aria-hidden="true" />
                </div>
                <div>
                  <CardTitle>Alamat</CardTitle>
                  <CardDescription>
                    Lorem ipsum dolor sit amet consectetur adipiscing sapien vitae pellentesque sem placerat in placerat
                    in.
                  </CardDescription>
                </div>
              </CardHeader>
            </Card>

            <Card>
              <CardHeader className="flex flex-row items-start gap-3">
                <div className="rounded-md p-2 bg-primary/10 text-primary">
                  <Phone className="size-5" aria-hidden="true" />
                </div>
                <div>
                  <CardTitle>Telepon</CardTitle>
                  <CardDescription>
                    +62 823 5462 7890 <br /> +62 825 8762 7516
                  </CardDescription>
                </div>
              </CardHeader>
            </Card>

            <Card>
              <CardHeader className="flex flex-row items-start gap-3">
                <div className="rounded-md p-2 bg-primary/10 text-primary">
                  <Mail className="size-5" aria-hidden="true" />
                </div>
                <div>
                  <CardTitle>Email</CardTitle>
                  <CardDescription>
                    info@wisatakuu.id <br /> booking@wisatakuu.id
                  </CardDescription>
                </div>
              </CardHeader>
            </Card>

            <Card>
              <CardHeader className="flex flex-row items-start gap-3">
                <div className="rounded-md p-2 bg-primary/10 text-primary">
                  <Clock className="size-5" aria-hidden="true" />
                </div>
                <div>
                  <CardTitle>Jam Operasional</CardTitle>
                  <CardDescription>
                    Senin - Jumat: 08.00 - 17.00 <br /> Sabtu - Minggu: 07.00 - 18.00
                  </CardDescription>
                </div>
              </CardHeader>
            </Card>
          </div>
        </section>

        <section className="mt-6 md:mt-8 grid gap-6 md:grid-cols-3">
          <Card className="md:col-span-1">
            <CardHeader>
              <CardTitle>Layanan Kami</CardTitle>
            </CardHeader>
            <CardContent>
              <ul className="space-y-3 text-sm text-foreground">
                {Array.from({ length: 6 }).map((_, i) => (
                <li key={i} className="flex items-center gap-2">
                  <CircleDot className="size-4 text-primary" aria-hidden="true" />
                  <span>Lorem ipsum</span>
                </li>
                ))}
              </ul>
            </CardContent>
          </Card>

          <Card className="md:col-span-2">
            <CardHeader>
              <CardTitle>Lokasi Kami</CardTitle>
            </CardHeader>
            <CardContent>
              <AspectRatio ratio={16 / 9}>
                <img src="/placeholder.svg" alt="Peta lokasi kantor/operasional" loading="lazy"
                  className="h-full w-full rounded-md object-cover" />
              </AspectRatio>
            </CardContent>
          </Card>
        </section>

        <section className="mt-10 md:mt-14">
          <Card>
            <CardHeader>
              <CardTitle className="text-2xl">Pertanyaan yang Sering Diajukan</CardTitle>
              <CardDescription>Beberapa hal yang sering ditanyakan pengunjung.</CardDescription>
            </CardHeader>
            <CardContent>
              <div className="grid gap-6 md:grid-cols-2">
                {faqs.map((item, idx) => (
                <article key={idx} className="space-y-2">
                  <h3 className="font-semibold text-foreground">{item.q}</h3>
                  <p className="text-sm text-muted-foreground">{item.a}</p>
                </article>
                ))}
              </div>
            </CardContent>
          </Card>
        </section>
      </main>
    </>
    );
    };

    export default Contact;
