import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { inmueblesIndex,inmuebleDelete } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { ButtonGroup } from "@/components/ui/button-group"
import { Button } from "@/components/ui/button";
import { SquarePenIcon, Trash2Icon } from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Inmuebles',
        href: inmueblesIndex().url,
    },
];

interface Ciudad{
    cod_postal:number,
    nombre: string,
    cod_provincia:number
}

interface Inmueble{
    id:number,
    num_catastro:string,
    direccion:string,
    numero:number,
    bloque:string,
    piso:number,
    puerta:string,
    ciudad: Ciudad
}

export default function Dashboard({inmuebles}:{inmuebles:Inmueble[]}) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Inmuebles" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                </div>
                <div className="relative min-h-[100vh] flex-1 overflow-hidden rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                    <Table>
                        <TableCaption>Últimos inmuebles disponibles</TableCaption>
                        <TableHeader>
                            <TableRow>
                                <TableHead className="w-[100px]">Num. de Catastro</TableHead>
                                <TableHead>Dirección</TableHead>
                                <TableHead>Número</TableHead>
                                <TableHead>Bloque</TableHead>
                                <TableHead>Piso</TableHead>
                                <TableHead>Puerta</TableHead>
                                <TableHead>Nombre Ciudad</TableHead>
                                <TableHead>Opciones</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {inmuebles.map((inmueble) => (
                            <TableRow key={inmueble.id}>
                                <TableCell className="font-medium">{inmueble.num_catastro}</TableCell>
                                <TableCell>{inmueble.direccion}</TableCell>
                                <TableCell>{inmueble.numero}</TableCell>
                                <TableCell>{inmueble.bloque}</TableCell>
                                <TableCell>{inmueble.piso}</TableCell>
                                <TableCell>{inmueble.puerta}</TableCell>
                                <TableCell>{inmueble.ciudad.nombre}</TableCell>
                                <TableCell>
                                    <ButtonGroup>
                                        <Button  size="icon">
                                            <SquarePenIcon />
                                        </Button>
                                        <Button variant="destructive" size="icon">
                                            <Trash2Icon />
                                        </Button>
                                    </ButtonGroup>
                                </TableCell>
                            </TableRow>))}
                        </TableBody>
                    </Table>
                </div>
            </div>
        </AppLayout>
    );
}
