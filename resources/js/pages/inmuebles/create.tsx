import AppLayout from '@/layouts/app-layout';
import inmueble, { create,store } from '@/routes/inmueble';
import { type BreadcrumbItem, Ciudad } from '@/types';
import { Head, router, useForm } from '@inertiajs/react';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import React from 'react';
import { Button } from '@/components/ui/button';
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Crear Inmueble',
        href: create().url,
    },
];


export default function CrearInmueble({ciudades}:{ciudades:Ciudad[]}) {

    const {data,setData,post,reset,processing,errors}=useForm({
        'num_catastro':'',
        'direccion':'',
        'numero':'',
        'bloque':'',
        'piso':'',
        'puerta':'',
        'cod_postal':'',
        'user_id':''
    });

    const handleSubmit= (e: React.FormEvent<HTMLFormElement>)=>{
        e.preventDefault();
        post(store().url,{
            onSuccess:()=>reset(),
            onError:(errors)=>{
              console.error('Errores de validación:',errors);
            },
            preserveScroll:true
        });
    }

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Crear Inmueble" />
            <div className="w-8/12 p-4">
                <form
                    onSubmit={handleSubmit}
                    method="post"
                    className="space-y-4"
                >
                    <div className="gap-1.5">
                        <Label htmlFor="num_catastro">
                            Introduce un número de catastro válido
                        </Label>
                        <Input
                            id="num_catastro"
                            placeholder="Numero de Catastro"
                            value={data.num_catastro}
                            onChange={(e) =>
                                setData('num_catastro', e.target.value)
                            }
                            className={
                                errors.num_catastro ? 'border-red-500' : ''
                            }
                        />
                        {errors.num_catastro && (
                            <span className="text-sm text-red-500">
                                {errors.num_catastro}
                            </span>
                        )}
                    </div>
                    <div className="gap-1.5">
                        <Label>Introduce la dirección del inmueble</Label>
                        <Input
                            placeholder="Dirección"
                            value={data.direccion}
                            onChange={(e) =>
                                setData('direccion', e.target.value)
                            }
                        ></Input>
                    </div>
                    <div className="gap-1.5">
                        <Label>Introduce el número del inmueble</Label>
                        <Input
                            placeholder="Número"
                            value={data.numero}
                            onChange={(e) => setData('numero', e.target.value)}
                        ></Input>
                    </div>
                    <div className="gap-1.5">
                        <Label>Introduce el bloque del Inmueble</Label>
                        <Input
                            placeholder="Bloque"
                            value={data.bloque}
                            onChange={(e) => setData('bloque', e.target.value)}
                        ></Input>
                    </div>
                    <div className="gap-1.5">
                        <Label>Introduce el piso del inmueble</Label>
                        <Input
                            placeholder="Piso"
                            value={data.piso}
                            onChange={(e) => setData('piso', e.target.value)}
                        ></Input>
                    </div>
                    <div className="gap-1.5">
                        <Label>Introduce la puerta del inmueble</Label>
                        <Input
                            placeholder="Puerta"
                            value={data.puerta}
                            onChange={(e) => setData('puerta', e.target.value)}
                        ></Input>
                    </div>
                    <div className="gap-1.5">
                        <Label>Introduce la ciudad del inmueble</Label>
                        <Input
                            placeholder="Id de Ciudad"
                            value={data.cod_postal}
                            onChange={(e) =>
                                setData('cod_postal', e.target.value)
                            }
                        ></Input>
                    </div>
                    <div className="gap-1.5">
                        <Label>Introduce el propietario del inmueble</Label>
                        <Input
                            placeholder="Id del Propietario"
                            value={data.user_id}
                            onChange={(e) =>
                                setData('user_id', e.target.value)
                            }
                        ></Input>
                    </div>

                    <div className="gap-1.5">
                        <Button type="submit" disabled={processing}>
                            {processing ? 'Creando...' : 'Crear Inmueble'}
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
/*<div className="gap-1.5">
                        <Select
                            value={data.ciudad_id}
                            onValueChange={(value) =>
                                setData('ciudad_id', value)
                            }
                        >
                            <SelectTrigger className="w-full max-w-48">
                                <SelectValue placeholder="Selecciona una ciudad" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectLabel>Ciudades</SelectLabel>
                                    {ciudades.map((ciudad) => (
                                        <SelectItem
                                            key={ciudad.cod_postal}
                                            value={ciudad.cod_postal.toString()}
                                        >
                                            {ciudad.nombre}
                                        </SelectItem>
                                    ))}
                                </SelectGroup>
                            </SelectContent>
                        </Select>
                        {errors.ciudad_id && (
                            <span className="text-sm text-red-500">
                                {errors.ciudad_id}
                            </span>
                        )}
                    </div>*/
