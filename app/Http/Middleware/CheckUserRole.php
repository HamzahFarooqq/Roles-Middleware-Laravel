<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }






        // FIRST METHOD 


    public function handle(Request $request, Closure $next, ...$role)
    {

        
        // Check if the user is authenticated
        
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        
        


        // Check if the user has any of the specified roles

        // foreach ($role as $rol) {

        //     // dd($role);

        //     if ($request->user()->hasRole($rol)) {
        //         return $next($request);
        //     }
        // }
         
            // dd($request->user()->role->name);




        if ($request->user()->role === 'admin') {
            return $next($request);
        }

        

        // if($request->user()->role === 'user')
        // {
        //     return $next($request);

        // }



        // Check if the user is accessing their own resource

        $userId = $request->route('id'); 
        

        if ($userId != $request->user()->id) {
            return response()->json(['error' => 'Unauthorized.'], 403);
        }

        
        
            return $next($request);
       





    // 2ND METHOD 

    // if (! $request->user() || ! $request->user()->hasRole($role))
    //  {
    //             // Redirect or abort the request if the user does not have the required role
    //             abort(403, 'Unauthorized action.');
    //         }

    //         return $next($request);






        // If the user does not have any of the specified roles, return unauthorized response
        // return response()->json(['error' => 'Unauthorized.'], 403);
        return response()->json(['error' => 'does not have any ROLE.'], 403);

    }







}
