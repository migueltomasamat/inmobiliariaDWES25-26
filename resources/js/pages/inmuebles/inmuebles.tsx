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
import { Badge } from "@/components/ui/badge"
import { SquarePenIcon, Trash2Icon } from 'lucide-react';
import { IconTrendingUp } from "@tabler/icons-react";
import {
    Card,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
    CardAction,
} from '@/components/ui/card';

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
interface estadisticas{
    total_inmuebles:number,
    inmuebles_ultimo_mes:number
}


export default function Dashboard({ inmuebles,estadisticas }: { inmuebles: Inmueble[],estadisticas:estadisticas}) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Inmuebles" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <Card className="@container/card">
                            <CardHeader>
                                <CardDescription>
                                    Inmuebles totales
                                </CardDescription>
                                <CardTitle className="text-2xl font-semibold tabular-nums @[250px]/card:text-3xl">
                                    {estadisticas.total_inmuebles}
                                </CardTitle>
                                <CardAction>
                                    <Badge variant="outline">
                                        <IconTrendingUp />
                                        +12.5%
                                    </Badge>
                                </CardAction>
                                <CardFooter className="flex-col items-start gap-1.5 text-sm">
                                    <div className="line-clamp-1 flex gap-2 font-small">
                                        Tendencias actual <IconTrendingUp className="size-4" />
                                    </div>
                                    <div className="text-muted-foreground">
                                        Desde el principio de la web
                                    </div>
                                </CardFooter>
                            </CardHeader>
                        </Card>
                    </div>
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <Card className="@container/card">
                            <CardHeader>
                                <CardDescription>
                                    Altas este mes
                                </CardDescription>
                                <CardTitle className="text-2xl font-semibold tabular-nums @[250px]/card:text-3xl">
                                    {estadisticas.inmuebles_ultimo_mes}
                                </CardTitle>
                                <CardAction>
                                    <Badge variant="outline">
                                        <IconTrendingUp />
                                        +7.5%
                                    </Badge>
                                </CardAction>
                                <CardFooter className="flex-col items-start gap-1.5 text-sm">
                                    <div className="line-clamp-1 flex gap-2 font-small">
                                        Tendencias actual <IconTrendingUp className="size-4" />
                                    </div>
                                    <div className="text-muted-foreground">
                                        Más pisos que el mes pasado
                                    </div>
                                </CardFooter>
                            </CardHeader>
                        </Card>
                    </div>
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                </div>
                <div className="relative min-h-[100vh] flex-1 overflow-hidden rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                    <Table>
                        <TableCaption>
                            Últimos inmuebles disponibles
                        </TableCaption>
                        <TableHeader>
                            <TableRow>
                                <TableHead className="w-[100px]">
                                    Num. de Catastro
                                </TableHead>
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
                                    <TableCell className="font-medium">
                                        {inmueble.num_catastro}
                                    </TableCell>
                                    <TableCell>{inmueble.direccion}</TableCell>
                                    <TableCell>{inmueble.numero}</TableCell>
                                    <TableCell>{inmueble.bloque}</TableCell>
                                    <TableCell>{inmueble.piso}</TableCell>
                                    <TableCell>{inmueble.puerta}</TableCell>
                                    <TableCell>
                                        {inmueble.ciudad.nombre}
                                    </TableCell>
                                    <TableCell>
                                        <ButtonGroup>
                                            <Button size="icon">
                                                <SquarePenIcon />
                                            </Button>
                                            <Button
                                                variant="destructive"
                                                size="icon"
                                            >
                                                <Trash2Icon />
                                            </Button>
                                        </ButtonGroup>
                                    </TableCell>
                                </TableRow>
                            ))}
                        </TableBody>
                    </Table>
                </div>
            </div>
        </AppLayout>
    );
}
