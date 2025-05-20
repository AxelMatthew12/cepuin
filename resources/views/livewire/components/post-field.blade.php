 <section class="p-5 bg-primary-300">
     <form action="/" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="flex items-start lg:gap-3 gap-1 border-b border-secondary-200 pb-5">
             <a href="/profile" class="shrink-0">
                 <img src="{{ asset('assets/images/frieren.jpg') }}" class="lg:size-12 size-10 rounded-full object-cover"
                     alt="profile">
             </a>
             <textarea id="postInput" name="input-post" placeholder="Ada apa hari ini bos..."
                 class="text-400 font-semibold text-secondary-200 w-full min-h-[2.5rem] max-h-[20rem] overflow-hidden resize-none p-2 bg-transparent lg:placeholder:text-300 placeholder:text-400 focus:outline-none"></textarea>
         </div>

         <div class="flex flex-col lg:flex-row lg:justify-between gap-4 pt-4">
             <div class="flex flex-col sm:flex-row sm:items-center sm:gap-5 gap-2">
                 <label class="flex items-center gap-2 text-400 font-medium cursor-pointer">
                     <span class="{{ config('constants.icon.image') }} size-6 text-primary-400"></span>
                     <span>Foto/Video</span>
                     <input type="file" name="media" class="hidden">
                 </label>

                 <select name="location" class="bg-primary-400 px-3 py-1 font-semibold rounded-full text-sm w-fit">
                     <option value="">Location</option>
                     <option value="jatim">Jatim</option>
                     <option value="jabar">Jabar</option>
                     <option value="jateng">Jateng</option>
                 </select>

                 <select name="topic" class="bg-primary-400 px-3 py-1 font-semibold rounded-full text-sm w-fit">
                     <option value="">Topik</option>
                     <option value="politik">Politik</option>
                     <option value="bencana">Bencana</option>
                     <option value="pendidikan">Pendidikan</option>
                 </select>
             </div>

             <div>
                 <button type="submit"
                     class="bg-primary-400 px-5 py-2 rounded-full font-semibold hover:bg-primary-200 transition-all text-sm w-fit">
                     Posting
                 </button>
             </div>
         </div>
     </form>
 </section>
